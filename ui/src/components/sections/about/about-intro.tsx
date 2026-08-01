import { cn } from '@/lib/utils';

export type AboutIntroProps = {
  eyebrow?: string;
  heading?: string;
  paragraphs?: string[];
  imageSrc?: string;
  imageAlt?: string;
  fill?: boolean;
  className?: string;
};

const defaultParagraphs = [
  'Your search for the best suitable property as per your budget and desired location ends here. We have best Industry’s top talent with technology to make the search and sell experience intelligent and seamless.',
  'Purchasing your home or some commercial investment in Gurgaon through Deep Real Estate is always preferable. In addition to assisting clients in finding the best deal on their dream house, we are a fully-licensed Haryana real estate agency. To assist our clients in navigating the challenging Gurgaon real estate market, we have created a more streamlined, open, and customer-focused home purchase process.',
  'We really put the needs of our clients first, and they consistently provide us with positive feedback. To learn what our customers had to say about the Deep Real Estate home buying experience, check out our Google reviews. We are passionate about each and every one of our customers having a positive Deep Real Estate experience.',
];

/**
 * About page — section 1.
 *
 * A 45 / 55 split: picture left, copy right. Stated as an explicit fraction
 * rather than a 12-column span, whose real width shifts with the gap.
 */
export const AboutIntro = ({
  eyebrow = 'About us',
  heading = 'Welcome to Deep Real Estate',
  paragraphs = defaultParagraphs,
  imageSrc = '/img/about/intro.jpg',
  imageAlt = 'Interior of a Gurgaon residence',
  fill = false,
  className,
}: AboutIntroProps) => {
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
          fill ? 'py-14 lg:py-10' : 'py-16 sm:py-24',
        )}
      >
        <div className="grid grid-cols-1 items-center gap-10 lg:grid-cols-[45%_1fr] lg:gap-14">
          {/* picture */}
          <figure className="relative">
            <div className="overflow-hidden rounded-2xl border bg-muted shadow-[0_24px_56px_-28px_rgb(0_0_0/0.35)]">
              <img
                src={imageSrc}
                alt={imageAlt}
                className="aspect-[4/3] w-full object-cover lg:aspect-[7/6]"
                loading="eager"
              />
            </div>
          </figure>

          {/* copy */}
          <div className="min-w-0">
            <div className="flex items-center gap-3">
              <span className="h-px w-8 bg-primary" />
              <p className="text-xs font-semibold uppercase tracking-[0.18em] text-primary">
                {eyebrow}
              </p>
            </div>

            <h1 className="mt-4 text-4xl font-bold leading-[1.05] tracking-tight text-foreground sm:text-5xl lg:text-[3.25rem]">
              {heading}
            </h1>

            {/* first paragraph carries more weight, the rest step back — the
                same three-size logic used on the home page */}
            <div className="mt-6 space-y-4">
              {paragraphs.map((p, i) => (
                <p
                  key={i}
                  className={cn(
                    'leading-[1.7]',
                    i === 0
                      ? 'text-[17px] text-foreground/85'
                      : 'text-[15px] text-muted-foreground',
                  )}
                >
                  {p}
                </p>
              ))}
            </div>
          </div>
        </div>
      </div>
    </section>
  );
};
