import { cn } from '@/lib/utils';

export type AboutMissionProps = {
  eyebrow?: string;
  heading?: string;
  lede?: string;
  beliefsIntro?: string;
  beliefs?: string[];
  images?: { src: string; alt: string }[];
  fill?: boolean;
  className?: string;
};

const defaultBeliefs = [
  'Performance across all lines of business.',
  'Delivering actual and tangible benefits to our clients.',
  'Solid fundamentals.',
  'Profitable Results',
];

const defaultImages = [
  { src: '/img/about/mission-a.jpg', alt: 'Commercial development in Gurgaon' },
  { src: '/img/about/mission-b.jpg', alt: 'Tower lobby of a Gurgaon residence' },
];

/**
 * About page — section 2.
 *
 * Copy left, two pictures side by side on the right. The pair share one fixed
 * aspect ratio so the row reads as a set rather than two unrelated crops.
 */
export const AboutMission = ({
  eyebrow = 'What drives us',
  heading = 'Mission and vision',
  lede = 'Deep Real Estate is committed to help you in making wise and profitable decisions in buying and selling of properties in Gurgaon. We Provide individuals and builders a better platform for realizing maximum profits out of real estate by understanding their needs.',
  beliefsIntro = 'We believe in……',
  beliefs = defaultBeliefs,
  images = defaultImages,
  fill = false,
  className,
}: AboutMissionProps) => {
  return (
    <section
      className={cn(
        'w-full bg-muted/40',
        fill && 'lg:flex lg:h-full lg:min-h-0 lg:items-center',
        className,
      )}
    >
      <div
        className={cn(
          'mx-auto w-full max-w-[1400px] px-5 sm:px-8',
          fill ? 'py-14 lg:py-10' : 'py-16 sm:py-24',
        )}
      >
        <div className="grid grid-cols-1 items-center gap-10 lg:grid-cols-2 lg:gap-14">
          {/* copy */}
          <div className="min-w-0">
            <div className="flex items-center gap-3">
              <span className="h-px w-8 bg-primary" />
              <p className="text-xs font-semibold uppercase tracking-[0.18em] text-primary">
                {eyebrow}
              </p>
            </div>

            <h2 className="mt-4 text-4xl font-bold leading-[1.05] tracking-tight text-foreground sm:text-5xl">
              {heading}
            </h2>

            <p className="mt-6 text-[17px] leading-[1.7] text-foreground/85">{lede}</p>

            <p className="mt-7 text-[15px] font-semibold text-foreground">{beliefsIntro}</p>

            <ul className="mt-4 space-y-3">
              {beliefs.map((b) => (
                <li key={b} className="flex items-start gap-3">
                  <span className="mt-[7px] grid h-4 w-4 shrink-0 place-items-center rounded-full bg-primary/15">
                    <svg viewBox="0 0 24 24" className="h-2.5 w-2.5 text-primary" fill="none" stroke="currentColor" strokeWidth="4" strokeLinecap="round" strokeLinejoin="round">
                      <path d="M20 6 9 17l-5-5" />
                    </svg>
                  </span>
                  <span className="text-[15px] leading-[1.6] text-muted-foreground">{b}</span>
                </li>
              ))}
            </ul>
          </div>

          {/* two pictures, side by side */}
          <div className="grid grid-cols-2 gap-4 sm:gap-5">
            {images.slice(0, 2).map((img, i) => (
              <figure
                key={img.src}
                className={cn(
                  'overflow-hidden rounded-2xl border bg-muted shadow-[0_20px_48px_-26px_rgb(0_0_0/0.35)]',
                  /* a slight vertical offset on the second frame stops the pair
                     reading as one image cut in half */
                  i === 1 && 'lg:mt-10',
                )}
              >
                <img
                  src={img.src}
                  alt={img.alt}
                  loading="lazy"
                  className="aspect-[3/4] w-full object-cover"
                />
              </figure>
            ))}
          </div>
        </div>
      </div>
    </section>
  );
};
