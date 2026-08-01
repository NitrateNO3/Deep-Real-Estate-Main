import { StarButton } from '@/components/ui/star-button';
import { useIsDark } from '@/lib/use-is-dark';
import { cn } from '@/lib/utils';

export type MapCard = {
  id: string | number;
  name: string;
  /** Short qualifier under the name — area, phase, what the map shows. */
  detail?: string;
  /** Small pill on the image, e.g. "Plot-level". */
  tag?: string;
  image: string;
  href?: string;
};

export type MapsSectionProps = {
  eyebrow?: string;
  heading?: string;
  lede?: string;
  maps?: MapCard[];
  ctaLabel?: string;
  ctaHref?: string;
  /**
   * Occupy exactly one viewport so this lands as the second screen. Tightens
   * the vertical rhythm and shortens the map frame to 16:10 — at 4:3 the row
   * plus header plus CTA overruns a 700px laptop screen. lg and up only.
   */
  fill?: boolean;
  className?: string;
};

const defaultMaps: MapCard[] = [
  {
    id: 'dlf-1',
    name: 'DLF Phase 1',
    detail: 'Blocks A–S · plot boundaries',
    tag: 'Plot-level',
    image: '/img/maps/dlf-phase-1.jpg',
    href: '#maps-page',
  },
  {
    id: 'dlf-2',
    name: 'DLF Phase 2',
    detail: 'Blocks & sector roads',
    tag: 'Plot-level',
    image: '/img/maps/dlf-phase-2.jpg',
    href: '#maps-page',
  },
  {
    id: 'dlf-3',
    name: 'DLF Phase 3',
    detail: 'Blocks U–T · plot boundaries',
    tag: 'Plot-level',
    image: '/img/maps/dlf-phase-3.jpg',
    href: '#maps-page',
  },
];

/**
 * Homepage section — Sector maps.
 *
 * Three cards on one row, all sharing an identical 4:3 frame so the row reads
 * as a set rather than three unrelated images. The map artwork varies wildly in
 * source dimensions, so every image is object-cover inside that fixed frame.
 */
export const MapsSection = ({
  eyebrow = 'Sector maps',
  heading = 'See exactly where it sits',
  lede = 'Need more oriented vision of sectors? Even plot-number wise? We have already arranged it for you here.',
  maps = defaultMaps,
  ctaLabel = 'Explore all maps',
  ctaHref = '#maps-page',
  fill = false,
  className,
}: MapsSectionProps) => {
  const isDark = useIsDark();

  return (
    <section
      className={cn(
        'w-full bg-background',
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
        {/* header */}
        <div className="mx-auto max-w-2xl text-center">
          <div className="flex items-center justify-center gap-3">
            <span className="h-px w-8 bg-primary" />
            <p className="text-xs font-semibold uppercase tracking-[0.18em] text-primary">
              {eyebrow}
            </p>
            <span className="h-px w-8 bg-primary" />
          </div>
          <h2 className="mt-5 text-3xl font-bold leading-[1.1] tracking-tight text-foreground sm:text-[2.6rem]">
            {heading}
          </h2>
          <p className="mt-5 text-[17px] leading-[1.65] text-muted-foreground">{lede}</p>
        </div>

        {/* cards */}
        <div
          className={cn(
            'grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 lg:gap-8',
            fill ? 'mt-10' : 'mt-14',
          )}
        >
          {maps.map((m) => (
            <a
              key={m.id}
              href={m.href ?? '#'}
              className="group flex flex-col overflow-hidden rounded-2xl border bg-card shadow-[0_10px_30px_-18px_rgb(0_0_0/0.4)] transition-all duration-300 hover:-translate-y-1 hover:border-primary/40 hover:shadow-[0_22px_50px_-24px_rgb(0_0_0/0.45)]"
            >
              {/* object-contain, not cover: a map is a document. Cropping one to
                  fill a frame cuts off its title, legend and edge blocks, and
                  uploaded maps vary widely in aspect ratio. Letterboxing inside
                  a shared frame keeps the row uniform without losing content. */}
              <div
                className={cn(
                  'relative overflow-hidden bg-muted p-3',
                  fill ? 'aspect-[16/10]' : 'aspect-[4/3]',
                )}
              >
                <img
                  src={m.image}
                  alt={`${m.name} sector map`}
                  loading="lazy"
                  className="h-full w-full object-contain transition-transform duration-500 group-hover:scale-[1.03]"
                />
                {m.tag && (
                  <span className="absolute left-3 top-3 rounded-full bg-background/85 px-3 py-1 text-[11px] font-semibold uppercase tracking-wider text-foreground backdrop-blur-sm">
                    {m.tag}
                  </span>
                )}
              </div>

              <div className="flex items-center justify-between gap-3 p-5">
                <div className="min-w-0">
                  <h3 className="truncate text-base font-semibold text-foreground">{m.name}</h3>
                  {m.detail && (
                    <p className="mt-1 truncate text-sm text-muted-foreground">{m.detail}</p>
                  )}
                </div>
                <span
                  aria-hidden="true"
                  className="grid h-9 w-9 shrink-0 place-items-center rounded-full border text-muted-foreground transition-colors group-hover:border-primary group-hover:bg-primary group-hover:text-primary-foreground"
                >
                  <svg viewBox="0 0 24 24" className="h-4 w-4" fill="none" stroke="currentColor" strokeWidth="2.5" strokeLinecap="round" strokeLinejoin="round">
                    <path d="m9 18 6-6-6-6" />
                  </svg>
                </span>
              </div>
            </a>
          ))}
        </div>

        {/* cta */}
        <div className={cn('flex justify-center', fill ? 'mt-8' : 'mt-12')}>
          <StarButton
            href={ctaHref}
            lightColor={isDark ? '#FAFAFA' : '#0080C6'}
            className="h-12 px-7 text-[15px] font-semibold"
          >
            {ctaLabel}
          </StarButton>
        </div>
      </div>
    </section>
  );
};
