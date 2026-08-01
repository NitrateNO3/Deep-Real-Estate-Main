import { ContactForm, type ContactValues } from '@/components/sections/contact/contact-form';
import { cn } from '@/lib/utils';

export type ContactPageProps = {
  address?: string;
  phones?: string[];
  emails?: string[];
  heading?: string;
  lede?: string;
  onSubmit?: (values: ContactValues) => void;
  className?: string;
};

const DEFAULT_ADDRESS =
  'G-564, Sushant Lok-II Extn. Sector 57, Nr. Scottish High Gurgaon, Haryana-122002, India';

const PinIcon = ({ className }: { className?: string }) => (
  <svg viewBox="0 0 24 24" className={className} fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round">
    <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0z" />
    <circle cx="12" cy="10" r="3" />
  </svg>
);

const PhoneIcon = ({ className }: { className?: string }) => (
  <svg viewBox="0 0 24 24" className={className} fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round">
    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.13.96.35 1.9.66 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.91.31 1.85.53 2.81.66A2 2 0 0 1 22 16.92z" />
  </svg>
);

const MailIcon = ({ className }: { className?: string }) => (
  <svg viewBox="0 0 24 24" className={className} fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round">
    <rect x="2" y="4" width="20" height="16" rx="2" />
    <path d="m22 7-10 6L2 7" />
  </svg>
);

/**
 * Contact page.
 *
 * The hero band carries a live Google map of the head office as its backdrop,
 * held well back so the heading and copy stay the thing you read. The two cards
 * straddle the boundary between the band and the page below it.
 */
export const ContactPage = ({
  address = DEFAULT_ADDRESS,
  phones = ['+91-124-4080100', '9810922338'],
  emails = ['info@deeprealestate.in'],
  heading = 'Contact us',
  lede = 'We are happy to answer questions about a sector, a project or a price. Call the office, write to us, or leave your details below and we will come back to you.',
  onSubmit,
  className,
}: ContactPageProps) => {
  const query = encodeURIComponent(address);
  // The plain `output=embed` form needs no API key.
  const mapEmbed = `https://www.google.com/maps?q=${query}&output=embed`;
  const mapLink = `https://www.google.com/maps/search/?api=1&query=${query}`;

  return (
    <div className={cn('w-full bg-background', className)}>
      {/* ------------------------------------------------------------ hero */}
      <section className="relative isolate overflow-hidden bg-muted/60">
        {/* map backdrop — pointer-events-none so it never swallows a scroll */}
        <iframe
          src={mapEmbed}
          title="Map of the Deep Real Estate head office"
          loading="lazy"
          referrerPolicy="no-referrer-when-downgrade"
          className="pointer-events-none absolute inset-0 -z-10 h-full w-full border-0 opacity-70 grayscale-[0.25] dark:opacity-45 dark:invert"
        />
        {/* wash, so headings sit on an even ground rather than on map detail */}
        <div
          aria-hidden="true"
          className="absolute inset-0 -z-10 bg-[linear-gradient(180deg,rgba(246,249,251,0.62)_0%,rgba(246,249,251,0.42)_50%,rgba(246,249,251,0.80)_100%)] dark:bg-[linear-gradient(180deg,rgba(8,21,31,0.72)_0%,rgba(8,21,31,0.58)_50%,rgba(8,21,31,0.88)_100%)]"
        />

        <div className="mx-auto w-full max-w-[1400px] px-5 pb-28 pt-8 text-center sm:px-8 sm:pb-32 sm:pt-10">
          <div className="mx-auto max-w-2xl">
            <div className="flex items-center justify-center gap-3">
              <span className="h-px w-8 bg-primary" />
              <p className="text-xs font-semibold uppercase tracking-[0.18em] text-primary">
                Get in touch
              </p>
              <span className="h-px w-8 bg-primary" />
            </div>

            <h1 className="mt-3 text-3xl font-bold leading-[1.05] tracking-tight text-foreground sm:text-4xl lg:text-[2.6rem]">
              {heading}
            </h1>
            <p className="mt-3 text-[15px] leading-[1.55] text-foreground/75">{lede}</p>

            {/* deliberately quiet — the form below is the primary action here */}
            <a
              href={mapLink}
              target="_blank"
              rel="noreferrer"
              className="mt-5 inline-flex items-center gap-2 rounded-full border border-foreground/25 bg-background/80 px-4 py-2 text-[13px] font-semibold text-foreground backdrop-blur-sm transition-colors hover:border-foreground/40 hover:bg-background"
            >
              <PinIcon className="h-4 w-4" />
              Open in Maps
            </a>
          </div>
        </div>
      </section>

      {/* ----------------------------------------------------------- cards */}
      {/* relative z-10 is load-bearing: the hero above is position:relative, and
          positioned elements paint above static ones regardless of DOM order —
          so without this the cards pulled up by the negative margin render
          *underneath* the hero's wash and come out looking faded. */}
      <section className="relative z-10 w-full">
        {/* pulled up so the cards straddle the band edge */}
        <div className="mx-auto -mt-24 w-full max-w-[1400px] px-5 pb-12 sm:-mt-24 sm:px-8 sm:pb-14">
          <div className="grid grid-cols-1 items-start gap-6 lg:grid-cols-12 lg:gap-8">
            {/* details */}
            <div className="lg:col-span-5">
              <div className="rounded-2xl border bg-card p-5 shadow-[0_24px_60px_-28px_rgb(0_0_0/0.45)] sm:p-6">
                <h2 className="text-lg font-bold tracking-tight text-foreground">
                  Head Office
                </h2>

                <ul className="mt-5 space-y-4">
                  <li className="flex gap-4">
                    <span className="grid h-10 w-10 shrink-0 place-items-center rounded-xl bg-primary/10 text-primary">
                      <PinIcon className="h-[18px] w-[18px]" />
                    </span>
                    <div className="min-w-0">
                      <p className="text-[13px] font-semibold uppercase tracking-wider text-muted-foreground">
                        Address
                      </p>
                      <p className="mt-1 text-[15px] leading-[1.65] text-foreground">{address}</p>
                    </div>
                  </li>

                  <li className="flex gap-4">
                    <span className="grid h-10 w-10 shrink-0 place-items-center rounded-xl bg-primary/10 text-primary">
                      <PhoneIcon className="h-[18px] w-[18px]" />
                    </span>
                    <div className="min-w-0">
                      <p className="text-[13px] font-semibold uppercase tracking-wider text-muted-foreground">
                        Phone Number
                      </p>
                      <p className="mt-1 flex flex-wrap items-center gap-x-2 gap-y-1">
                        {phones.map((p, i) => (
                          <span key={p} className="inline-flex items-center gap-2">
                            {i > 0 && <span className="text-muted-foreground/50">|</span>}
                            <a
                              href={`tel:${p.replace(/[^\d+]/g, '')}`}
                              className="text-[15px] font-semibold text-foreground transition-colors hover:text-primary"
                            >
                              {p}
                            </a>
                          </span>
                        ))}
                      </p>
                    </div>
                  </li>

                  <li className="flex gap-4">
                    <span className="grid h-10 w-10 shrink-0 place-items-center rounded-xl bg-primary/10 text-primary">
                      <MailIcon className="h-[18px] w-[18px]" />
                    </span>
                    <div className="min-w-0">
                      <p className="text-[13px] font-semibold uppercase tracking-wider text-muted-foreground">
                        Emails
                      </p>
                      {emails.map((e) => (
                        <a
                          key={e}
                          href={`mailto:${e}`}
                          className="mt-1 block truncate text-[15px] font-semibold text-primary hover:underline"
                        >
                          {e}
                        </a>
                      ))}
                    </div>
                  </li>
                </ul>
              </div>
            </div>

            {/* form — same component the home page uses */}
            <div className="lg:col-span-7">
              <ContactForm onSubmit={onSubmit} compact />
            </div>
          </div>
        </div>
      </section>
    </div>
  );
};
