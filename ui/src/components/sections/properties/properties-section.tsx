import { cn } from '@/lib/utils';
import { PropertyCard, type Property } from './property-card';

/** Gradient stops for the CTA — the same three-stop ramp as the contact form's
    submit, so every filled control on the page shares one recipe. */
const ACCENT = {
  from: '#0b9ae0',
  mid: '#0080c6',
  to: '#00618f',
  glow: 'rgba(0,128,198,0.30)',
};

export type PropertiesSectionProps = {
  /** Big coloured title. */
  title?: string;
  /** Second line under the title. */
  heading?: string;
  lede?: string;
  items?: Property[];
  ctaLabel?: string;
  ctaHref?: string;
  /** Occupy exactly one viewport, lg and up. */
  fill?: boolean;
  className?: string;
};

/* The two listings the business actually carries, with its own photography and
   its own figures. Nothing here is filled in — no `developer` on either,
   because neither is a builder project and the pill would have to be invented
   to populate it.

   There is no Top Properties set. A switch here used to offer one, backed by
   three listings that did not exist; with nothing real behind it, the switch is
   gone rather than left pointing at an empty tab. */
const defaultItems: Property[] = [
  {
    id: 'suncity-floors',
    name: '4 BHK Luxury Floors – Suncity',
    location: 'D Block, Suncity, Gurugram, Haryana',
    price: '₹5.50 Cr',
    priceUnit: 'from ₹4.60 Cr',
    badge: 'For Sale · Residential',
    image: '/img/props/suncity-floors.jpg',
    specs: [
      { label: 'Beds', value: '4' },
      { label: 'Baths', value: '4' },
      { label: 'SqFt', value: '2,664' },
    ],
  },
  {
    id: 'farmhouse-garatpurbas',
    name: 'Premium Farmhouse – Garat Pur Bas',
    location: 'Village Garat Pur Bas, Gurugram, Haryana',
    price: 'On call',
    priceUnit: '₹30,000 / sq. yard',
    badge: 'For Sale · Farmhouse',
    image: '/img/props/farmhouse-garatpurbas.jpg',
    specs: [
      { label: 'Plot', value: '3,000 sq. yards' },
      { label: 'Road', value: '30 m' },
    ],
  },
];

/**
 * Homepage section — Featured properties.
 *
 * Cards lead and the copy sits beside them. The heading block used to run full
 * width above the row, which pushed the listings under the fold; in a column
 * next to them, both fit one screen.
 */
export const PropertiesSection = ({
  title = 'Featured Properties',
  heading = 'Handpicked listings',
  lede = 'A current selection from our residential and commercial books — with the pricing context to judge them.',
  items = defaultItems,
  ctaLabel = 'Get more info',
  ctaHref = '#contact-page',
  fill = false,
  className,
}: PropertiesSectionProps) => {
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
          fill ? 'py-10 lg:py-8' : 'py-10 sm:py-12',
        )}
      >
        <div className="grid grid-cols-1 gap-8 lg:grid-cols-[1fr_330px] lg:items-center lg:gap-10">
          {/* ------------------------------------------------------- cards */}
          <div className="order-2 lg:order-1">
            <div className="grid grid-cols-1 gap-5 sm:grid-cols-2">
              {items.map((p) => (
                <PropertyCard key={p.id} property={p} />
              ))}
            </div>

            {/* Says what is true rather than filling the row with invented
                stock. */}
            {items.length === 0 && (
              <div className="rounded-2xl border border-dashed py-16 text-center">
                <p className="text-[15px] font-medium text-foreground">
                  Nothing listed here at the moment.
                </p>
                <p className="mt-1.5 text-sm text-muted-foreground">
                  Call the office and we will send what is currently on the book.
                </p>
              </div>
            )}
          </div>

          {/* -------------------------------------------------------- copy */}
          <aside className="order-1 lg:order-2">
            <h2 className="text-4xl font-extrabold uppercase leading-[1.02] tracking-tight sm:text-[2.9rem]">
              <span className="bg-[linear-gradient(100deg,#0b9ae0_0%,#0080c6_45%,#00618f_100%)] bg-clip-text text-transparent">
                {title}
              </span>
            </h2>

            <p className="mt-2 text-xl font-semibold tracking-tight text-foreground">{heading}</p>
            <p className="mt-2.5 text-[15px] leading-[1.6] text-muted-foreground">{lede}</p>

            {/* Filled rather than outlined, with a shine crossing it on a loop —
                this is the one thing on the section we want pressed, and an
                outlined pill read like a footnote. The sheen sits inside the
                button's own overflow, so it never escapes the rounded edge. */}
            <div className="mt-6">
              <a
                href={ctaHref}
                className="group/cta relative isolate inline-flex h-12 cursor-pointer items-center gap-2 overflow-hidden rounded-full px-8 text-[15px] font-bold text-white shadow-[0_14px_30px_-12px_var(--cta-glow)] transition-transform duration-300 hover:-translate-y-0.5"
                style={
                  {
                    background: `linear-gradient(120deg, ${ACCENT.from} 0%, ${ACCENT.mid} 50%, ${ACCENT.to} 100%)`,
                    '--cta-glow': ACCENT.glow,
                  } as React.CSSProperties
                }
              >
                <span
                  aria-hidden="true"
                  className="animate-sheen pointer-events-none absolute inset-y-0 -z-10 w-10 bg-white/40 motion-reduce:hidden"
                  style={{ animationDuration: '2.4s', animationIterationCount: 'infinite' }}
                />
                {ctaLabel}
                <svg viewBox="0 0 24 24" className="h-4 w-4 transition-transform duration-300 group-hover/cta:translate-x-1" fill="none" stroke="currentColor" strokeWidth="2.5" strokeLinecap="round" strokeLinejoin="round">
                  <path d="m9 18 6-6-6-6" />
                </svg>
              </a>
            </div>
          </aside>
        </div>
      </div>
    </section>
  );
};
