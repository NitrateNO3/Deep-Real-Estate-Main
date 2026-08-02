import { useCallback, useEffect, useLayoutEffect, useRef, useState } from 'react';
import { StarButton } from '@/components/ui/star-button';
import { useIsDark } from '@/lib/use-is-dark';
import { cn } from '@/lib/utils';
import { PropertyCard, type Property } from './property-card';

export type TabAccent = {
  /** Gradient stops for the sliding pill — same three-stop ramp as the
      submit button, so every filled control on the page shares one recipe. */
  from: string;
  mid: string;
  to: string;
  /** Drop shadow under the pill. Kept low; this is a control, not a beacon. */
  glow: string;
};

export type PropertyTab = {
  id: string;
  label: string;
  ctaLabel: string;
  ctaHref?: string;
  accent?: TabAccent;
  items: Property[];
};

/* Blue is the brand; green is the secondary from the original palette, so the
   two tabs read as two moods of the same identity rather than random colours.
   Both are pitched at the same value as the submit button — the earlier pair
   were a stop brighter and pulled focus off the cards they sit above. */
const BLUE: TabAccent = {
  from: '#0b9ae0',
  mid: '#0080c6',
  to: '#00618f',
  glow: 'rgba(0,128,198,0.30)',
};
const GREEN: TabAccent = {
  from: '#4da466',
  mid: '#3d8f53',
  to: '#2c6b3e',
  glow: 'rgba(61,143,83,0.28)',
};

export type PropertiesSectionProps = {
  eyebrow?: string;
  heading?: string;
  lede?: string;
  tabs?: PropertyTab[];
  /** Occupy exactly one viewport, lg and up. */
  fill?: boolean;
  className?: string;
};

const featured: Property[] = [
  {
    id: 1,
    name: 'The Camellias — 4 BHK Residence',
    location: 'DLF Phase 5, Golf Course Road',
    price: '₹ 12.8 Cr',
    priceUnit: '₹ 25,400 / Sq.Ft.',
    developer: 'DLF',
    badge: 'Residential',
    image: '/img/props/p1.jpg',
    specs: [
      { label: 'Bedrooms', value: '4 BHK' },
      { label: 'Built-up', value: '5,040 Sq.Ft.' },
      { label: 'Possession', value: 'Ready' },
    ],
  },
  {
    id: 2,
    name: 'M3M Golf Estate — 3 BHK',
    location: 'Sector 65, Golf Course Ext.',
    price: '₹ 4.2 Cr',
    priceUnit: '₹ 14,800 / Sq.Ft.',
    developer: 'M3M',
    badge: 'Residential',
    image: '/img/props/p2.jpg',
    specs: [
      { label: 'Bedrooms', value: '3 BHK' },
      { label: 'Built-up', value: '2,840 Sq.Ft.' },
      { label: 'Possession', value: 'Ready' },
    ],
  },
  {
    id: 3,
    name: 'Independent Floor — Block S',
    location: 'DLF Phase 3, Gurgaon',
    price: '₹ 3.1 Cr',
    priceUnit: '₹ 11,200 / Sq.Ft.',
    developer: 'Deep Listing',
    badge: 'Residential',
    image: '/img/props/p3.jpg',
    specs: [
      { label: 'Bedrooms', value: '3 BHK' },
      { label: 'Plot', value: '360 Sq.Yd.' },
      { label: 'Possession', value: 'Immediate' },
    ],
  },
];

const top: Property[] = [
  {
    id: 4,
    name: 'Corporate Suite — Cyber City',
    location: 'DLF Cyber City, Phase 2',
    price: '₹ 8.5 Cr',
    priceUnit: '₹ 18,900 / Sq.Ft.',
    developer: 'DLF',
    badge: 'Commercial',
    image: '/img/props/p4.jpg',
    specs: [
      { label: 'Carpet', value: '4,500 Sq.Ft.' },
      { label: 'Floor', value: '11th' },
      { label: 'Fit-out', value: 'Furnished' },
    ],
  },
  {
    id: 5,
    name: 'Retail Frontage — Sector 29',
    location: 'Leisure Valley, Sector 29',
    price: '₹ 6.9 Cr',
    priceUnit: '₹ 22,100 / Sq.Ft.',
    developer: 'Deep Listing',
    badge: 'Commercial',
    image: '/img/props/p5.jpg',
    specs: [
      { label: 'Frontage', value: '32 ft' },
      { label: 'Carpet', value: '3,120 Sq.Ft.' },
      { label: 'Floor', value: 'Ground' },
    ],
  },
  {
    id: 6,
    name: 'Residential Plot — Sector 57',
    location: 'Sushant Lok II, Sector 57',
    price: '₹ 5.4 Cr',
    priceUnit: '₹ 1.35 L / Sq.Yd.',
    developer: 'Deep Listing',
    badge: 'Plot',
    image: '/img/props/p6.jpg',
    specs: [
      { label: 'Plot', value: '400 Sq.Yd.' },
      { label: 'Facing', value: 'East' },
      { label: 'Status', value: 'Clear title' },
    ],
  },
];

/* Both tabs send you to the contact page rather than to a listing index —
   the ask here is a conversation about a property, not another grid of them. */
const defaultTabs: PropertyTab[] = [
  {
    id: 'featured',
    label: 'Featured',
    ctaLabel: 'Get more info',
    ctaHref: '#contact-page',
    accent: BLUE,
    items: featured,
  },
  {
    id: 'top',
    label: 'Top Properties',
    ctaLabel: 'Get more info',
    ctaHref: '#contact-page',
    accent: GREEN,
    items: top,
  },
];

/**
 * Homepage section — Featured / Top properties.
 * A segmented control swaps the set; the grid keeps the same three columns so
 * nothing jumps when you switch.
 */
export const PropertiesSection = ({
  eyebrow = 'Handpicked',
  heading = 'Featured & top properties',
  lede = 'A current selection from our residential and commercial books — with the pricing context to judge them.',
  tabs = defaultTabs,
  fill = false,
  className,
}: PropertiesSectionProps) => {
  const isDark = useIsDark();
  const [active, setActive] = useState(tabs[0]?.id ?? '');
  const current = tabs.find((t) => t.id === active) ?? tabs[0];
  const accent = current?.accent ?? BLUE;

  /* Sliding pill: measured from the live buttons rather than assumed, because
     the two labels are different widths and localisation would change them. */
  const listRef = useRef<HTMLDivElement | null>(null);
  const tabRefs = useRef<(HTMLButtonElement | null)[]>([]);
  const [pill, setPill] = useState({ left: 0, width: 0 });
  const [ready, setReady] = useState(false);

  const measure = useCallback(() => {
    const index = tabs.findIndex((t) => t.id === active);
    const el = tabRefs.current[index < 0 ? 0 : index];
    if (!el) return;
    setPill({ left: el.offsetLeft, width: el.offsetWidth });
  }, [active, tabs]);

  useLayoutEffect(() => {
    measure();
    if (!ready) {
      const t = window.setTimeout(() => setReady(true), 60);
      return () => window.clearTimeout(t);
    }
  }, [measure, ready]);

  useEffect(() => {
    const el = listRef.current;
    if (!el) return;
    const ro = new ResizeObserver(measure);
    ro.observe(el);
    document.fonts?.ready.then(measure).catch(() => {});
    return () => ro.disconnect();
  }, [measure]);

  return (
    <section
      // the welcome section's "Browse Properties" scrolls here
      id="featured-properties"
      className={cn(
        'w-full scroll-mt-20 bg-background',
        fill && 'lg:flex lg:h-full lg:min-h-0 lg:items-center',
        className,
      )}
    >
      <div
        className={cn(
          'mx-auto w-full max-w-[1400px] px-5 sm:px-8',
          fill ? 'py-16 lg:py-10' : 'py-20 sm:py-24',
        )}
      >
        {/* header + tabs on one row, so the control costs no extra height */}
        <div className="flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
          <div className="max-w-2xl">
            <div className="flex items-center gap-3">
              <span className="h-px w-8 bg-primary" />
              <p className="text-xs font-semibold uppercase tracking-[0.18em] text-primary">
                {eyebrow}
              </p>
            </div>
            <h2 className="mt-4 text-3xl font-bold leading-[1.1] tracking-tight text-foreground sm:text-[2.5rem]">
              {heading}
            </h2>
            <p className="mt-4 text-[16px] leading-[1.65] text-muted-foreground">{lede}</p>
          </div>

          <div
            ref={listRef}
            role="tablist"
            aria-label="Property sets"
            className="relative isolate inline-flex shrink-0 self-start rounded-full border bg-muted/60 p-1 lg:self-auto"
          >
            {/* the pill itself — slides and recolours together */}
            <span
              aria-hidden="true"
              className={cn(
                'absolute inset-y-1 rounded-full',
                ready &&
                  'transition-[left,width,background-image,box-shadow] duration-500 [transition-timing-function:cubic-bezier(0.34,1.3,0.5,1)] motion-reduce:transition-none',
              )}
              style={{
                left: pill.left,
                width: pill.width,
                backgroundImage: `linear-gradient(135deg, ${accent.from} 0%, ${accent.mid} 45%, ${accent.to} 100%)`,
                boxShadow: `0 6px 16px -8px ${accent.glow}`,
              }}
            />
            {tabs.map((t, i) => {
              const isActive = t.id === current?.id;
              return (
                <button
                  key={t.id}
                  ref={(el) => {
                    tabRefs.current[i] = el;
                  }}
                  role="tab"
                  type="button"
                  aria-selected={isActive}
                  onClick={() => setActive(t.id)}
                  className={cn(
                    'relative z-10 cursor-pointer whitespace-nowrap rounded-full px-5 py-2.5 text-sm font-semibold transition-colors duration-300',
                    isActive ? 'text-white' : 'text-muted-foreground hover:text-foreground',
                  )}
                >
                  {t.label}
                </button>
              );
            })}
          </div>
        </div>

        {/* cards */}
        <div
          className={cn(
            'grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 lg:gap-8',
            fill ? 'mt-8' : 'mt-12',
          )}
        >
          {current?.items.map((p) => (
            <PropertyCard key={p.id} property={p} />
          ))}
        </div>

        <div className={cn('flex justify-center', fill ? 'mt-8' : 'mt-12')}>
          {/* the CTA's travelling light picks up the active tab's colour, so the
              switch and the button read as one control surface */}
          <StarButton
            href={current?.ctaHref ?? '#'}
            lightColor={isDark ? '#FAFAFA' : accent.from}
            className="h-12 px-7 text-[15px] font-semibold"
          >
            {current?.ctaLabel ?? 'Get more info'}
          </StarButton>
        </div>
      </div>
    </section>
  );
};
