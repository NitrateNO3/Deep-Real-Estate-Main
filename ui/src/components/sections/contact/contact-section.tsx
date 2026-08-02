import { ContactForm, type ContactValues } from './contact-form';
import { cn } from '@/lib/utils';

export type FlowStep = {
  step: string;
  title: string;
  body: string;
};

export type { ContactValues };

export type ContactSectionProps = {
  phone?: string;
  mobile?: string;
  email?: string;
  steps?: FlowStep[];
  onSubmit?: (values: ContactValues) => void;
  fill?: boolean;
  className?: string;
};

const defaultSteps: FlowStep[] = [
  {
    step: '01',
    title: 'Reach us',
    body: 'Call, write, or send the form. You get a person, not a ticket number.',
  },
  {
    step: '02',
    title: 'Choose location',
    body: 'Sector, phase or landmark — we narrow Gurgaon down to the pockets that fit you.',
  },
  {
    step: '03',
    title: 'Choose your property',
    body: 'We shortlist, you visit. Only options that genuinely exist at the price quoted.',
  },
  {
    step: '04',
    title: 'Confirmation',
    body: 'Registry, dues and possession handled end to end until the keys are yours.',
  },
];

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
 * Homepage section — contact + process flow.
 *
 * The form is the page's primary conversion point, so it is treated as an
 * object rather than a set of outlines: raised card, filled fields with real
 * borders, and a solid full-width submit. The section sits on a tinted ground
 * so the white card has something to lift off.
 */
export const ContactSection = ({
  phone = '0124-4356789',
  mobile = '+91 98110 00000',
  email = 'info@deeprealestate.in',
  steps = defaultSteps,
  onSubmit,
  fill = false,
  className,
}: ContactSectionProps) => {

  return (
    /* Two parts, each on its own ground: the form half on the light tint, the
       "How we work" half on the navy the site uses for its dark bands. They
       meet edge to edge, so the colour change is the split. */
    <section
      className={cn(
        'grid w-full grid-cols-1 lg:grid-cols-2',
        fill && 'lg:h-full lg:min-h-0',
        className,
      )}
    >
      {/* =============================================== part 1 · contact */}
      <div
        className={cn(
          'flex flex-col justify-center bg-[#eef4f9] px-5 sm:px-8 lg:px-10 xl:px-14',
          fill ? 'py-14 lg:py-10' : 'py-16 sm:py-20',
        )}
      >
        {/* ------------------------------------------------------- header */}
        <div className="max-w-3xl">
          <div className="flex items-center gap-3">
            <span className="h-px w-8 bg-primary" />
            <p className="text-xs font-semibold uppercase tracking-[0.18em] text-primary">
              Contact us
            </p>
          </div>
          <h2 className="mt-4 text-4xl font-bold leading-[1.03] tracking-tight text-foreground sm:text-5xl lg:text-[3.5rem]">
            Tell us what you&apos;re looking for.
          </h2>
          <p className="mt-4 max-w-xl text-[17px] leading-[1.6] text-muted-foreground">
            Tell us the sector, the budget and the timeline. We will come back to you on the
            number you leave.
          </p>

          <div className="mt-5 flex flex-wrap items-center gap-x-6 gap-y-3">
            <a
              href={`tel:${phone}`}
              className="inline-flex items-center gap-2 text-[15px] font-semibold text-foreground transition-colors hover:text-primary"
            >
              <PhoneIcon className="h-4 w-4 text-primary" />
              {phone}
            </a>
            <a
              href={`tel:${mobile}`}
              className="inline-flex items-center gap-2 text-[15px] font-semibold text-foreground transition-colors hover:text-primary"
            >
              <PhoneIcon className="h-4 w-4 text-primary" />
              {mobile}
            </a>
            <a
              href={`mailto:${email}`}
              className="inline-flex items-center gap-2 text-[15px] font-semibold text-primary hover:underline"
            >
              <MailIcon className="h-4 w-4" />
              {email}
            </a>
          </div>
        </div>

        {/* -------------------------------------------------- form card */}
        <div className={cn(fill ? 'mt-8' : 'mt-10')}>
          <ContactForm onSubmit={onSubmit} compact={fill} />
        </div>
      </div>

      {/* ========================================== part 2 · how we work */}
      <div
        className={cn(
          'flex flex-col justify-center bg-[#0b1d2a] px-5 sm:px-8 lg:px-10 xl:px-14',
          fill ? 'py-14 lg:py-10' : 'py-16 sm:py-20',
        )}
      >
        <div className="flex items-center gap-3">
          <span className="h-px w-8 bg-sky-400" />
          <p className="text-xs font-semibold uppercase tracking-[0.18em] text-sky-400">
            The process
          </p>
        </div>

        <h2 className="mt-4 text-4xl font-bold leading-[1.03] tracking-tight text-white sm:text-5xl lg:text-[3.5rem]">
          How we work
        </h2>

        <ol className="relative mt-10">
          <span
            aria-hidden="true"
            className="absolute bottom-10 left-[19px] top-3 w-px bg-white/20"
          />
          {steps.map((s) => (
            <li key={s.step} className="relative flex gap-5 pb-7 last:pb-0">
              <span className="relative z-10 grid h-10 w-10 shrink-0 place-items-center rounded-full border-2 border-sky-400 bg-[#0b1d2a] text-xs font-bold text-sky-400">
                {s.step}
              </span>
              <div className="pt-1.5">
                <h3 className="text-base font-semibold text-white">{s.title}</h3>
                <p className="mt-1 text-sm leading-[1.6] text-white/65">{s.body}</p>
              </div>
            </li>
          ))}
        </ol>
      </div>
    </section>
  );
};
