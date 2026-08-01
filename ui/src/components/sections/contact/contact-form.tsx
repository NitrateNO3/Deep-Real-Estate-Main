import React from 'react';
import { LiquidMetalButton } from '@/components/ui/liquid-metal-button';
import { cn } from '@/lib/utils';

export type ContactValues = {
  fullname: string;
  mobileno: string;
  emailid: string;
  subject: string;
  message: string;
};

export type ContactFormProps = {
  onSubmit?: (values: ContactValues) => void;
  /** Fewer message rows, for viewport-height layouts. */
  compact?: boolean;
  className?: string;
};

/**
 * The contact form, shared by the home page section and the contact page so
 * the two cannot drift apart.
 *
 * Field names mirror the live Contact_Us.php exactly — fullname, mobileno,
 * emailid, subject, message — so wiring it to the existing endpoint is a
 * one-to-one mapping rather than a re-spec.
 */
export const ContactForm = ({ onSubmit, compact = false, className }: ContactFormProps) => {
  const handleSubmit = (e: React.FormEvent<HTMLFormElement>) => {
    e.preventDefault();
    const fd = new FormData(e.currentTarget);
    onSubmit?.({
      fullname: String(fd.get('fullname') ?? ''),
      mobileno: String(fd.get('mobileno') ?? ''),
      emailid: String(fd.get('emailid') ?? ''),
      subject: String(fd.get('subject') ?? ''),
      message: String(fd.get('message') ?? ''),
    });
  };

  // Filled fields with a real border read as "type here"; hairline-on-white
  // outlines read as decoration.
  const field = cn(
    'w-full rounded-xl border border-border bg-muted/50 text-foreground placeholder:text-muted-foreground/60 transition-all',
    'focus:border-primary focus:bg-background focus:outline-none focus:ring-4 focus:ring-primary/15',
    compact ? 'px-3.5 py-2.5 text-sm' : 'px-4 py-3 text-[15px]',
  );
  const labelCls = cn(
    'block font-semibold text-foreground',
    compact ? 'mb-1 text-xs' : 'mb-1.5 text-[13px]',
  );

  return (
    <div
      className={cn(
        'rounded-2xl border bg-card shadow-[0_24px_60px_-28px_rgb(0_0_0/0.45)]',
        compact ? 'p-5 sm:p-6' : 'p-6 sm:p-8',
        className,
      )}
    >
      <form onSubmit={handleSubmit} className={cn('grid grid-cols-1 sm:grid-cols-2', compact ? 'gap-3' : 'gap-4')}>
        <div>
          <label className={labelCls} htmlFor="c-fullname">
            Full Name
          </label>
          <input
            id="c-fullname"
            name="fullname"
            type="text"
            required
            autoComplete="name"
            placeholder="Your name"
            className={field}
          />
        </div>

        <div>
          <label className={labelCls} htmlFor="c-mobileno">
            Mobile No.
          </label>
          <input
            id="c-mobileno"
            name="mobileno"
            type="tel"
            required
            autoComplete="tel"
            inputMode="tel"
            placeholder="10-digit mobile"
            className={field}
          />
        </div>

        <div>
          <label className={labelCls} htmlFor="c-emailid">
            Email Address
          </label>
          <input
            id="c-emailid"
            name="emailid"
            type="email"
            required
            autoComplete="email"
            placeholder="you@example.com"
            className={field}
          />
        </div>

        <div>
          <label className={labelCls} htmlFor="c-subject">
            What is this regarding?
          </label>
          <input
            id="c-subject"
            name="subject"
            type="text"
            placeholder="Buying, selling or renting"
            className={field}
          />
        </div>

        <div className="sm:col-span-2">
          <label className={labelCls} htmlFor="c-message">
            Message
          </label>
          <textarea
            id="c-message"
            name="message"
            rows={compact ? 2 : 4}
            placeholder="Budget, preferred sector, timeline…"
            className={cn(field, 'resize-y')}
          />
        </div>

        <div className="sm:col-span-2">
          <LiquidMetalButton
            type="submit"
            label="Send message"
            width="100%"
            height={compact ? 48 : 56}
            fontSize={compact ? 14 : 15}
          />
          <p className={cn('text-center text-xs text-muted-foreground', compact ? 'mt-2' : 'mt-3')}>
            Your details go to our office only. No lists, no spam.
          </p>
        </div>
      </form>
    </div>
  );
};
