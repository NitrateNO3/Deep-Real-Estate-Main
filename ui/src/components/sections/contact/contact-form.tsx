import React from 'react';
import { LiquidMetalButton } from '@/components/ui/liquid-metal-button';
import { GlassCard } from '@/components/ui/glass-card/glass-card';
import { cn } from '@/lib/utils';

export type ContactValues = {
  fullname: string;
  mobileno: string;
  emailid: string;
  subject: string;
  propertytype: string;
  location: string;
  message: string;
};

/* The three pick-lists. Kept as data so the markup below stays one <select>
   rendered three times rather than three near-identical blocks. */
const SUBJECTS = [
  'Buying Property',
  'Selling Property',
  'Valuation & Consultation',
  'Rent / Lease',
  'General Inquiry',
];
const PROPERTY_TYPES = [
  'Residential (Floors/Apartments)',
  'Plots / Land',
  'Commercial',
  'Farmhouse',
];
const LOCATIONS = ['Gurugram', 'Manesar', 'Dharuhera', 'Sohna'];

/**
 * A pick-list field.
 *
 * Module level, not nested in ContactForm: a component defined inside a render
 * is a new type on every render, so React would unmount and remount each select
 * and drop whatever the visitor had picked.
 *
 * The native chevron is suppressed (appearance-none) and redrawn in brand blue,
 * because the OS default is grey and would be the one control on the card that
 * ignores the palette.
 */
const SelectField = ({
  id,
  name,
  label,
  options,
  fieldCls,
  labelCls,
  chevronCls,
  emptyOptionCls,
}: {
  id: string;
  name: string;
  label: string;
  options: string[];
  fieldCls: string;
  labelCls: string;
  chevronCls: string;
  emptyOptionCls: string;
}) => (
  <div>
    <label className={labelCls} htmlFor={id}>
      {label}
    </label>
    <div className="relative">
      <select
        id={id}
        name={name}
        defaultValue=""
        /* A select has no ::placeholder, so "Please select" is matched to the
           text inputs' prompt styling by testing whether the empty option is
           the one currently chosen. */
        className={cn(fieldCls, 'cursor-pointer appearance-none pr-10', emptyOptionCls)}
      >
        {/* The open dropdown is drawn by the OS, not by us — on the glass
            variant a white-on-white option list is the failure mode, so the
            colours are pinned here rather than inherited. */}
        <option value="" style={{ color: '#0d1b2a', backgroundColor: '#ffffff' }}>
          Please select
        </option>
        {options.map((o) => (
          <option key={o} value={o} style={{ color: '#0d1b2a', backgroundColor: '#ffffff' }}>
            {o}
          </option>
        ))}
      </select>
      <svg
        viewBox="0 0 24 24"
        aria-hidden="true"
        className={cn('pointer-events-none absolute right-3.5 top-1/2 h-4 w-4 -translate-y-1/2', chevronCls)}
        fill="none"
        stroke="currentColor"
        strokeWidth="2.5"
        strokeLinecap="round"
        strokeLinejoin="round"
      >
        <path d="m6 9 6 6 6-6" />
      </svg>
    </div>
  </div>
);

export type ContactFormProps = {
  onSubmit?: (values: ContactValues) => void;
  /** Fewer message rows, for viewport-height layouts. */
  compact?: boolean;
  /**
   * 'card'  — solid white card. For light grounds, e.g. the contact page.
   * 'glass' — frosted panel. Needs a photograph or a dark ground behind it;
   *           over a flat light fill there is nothing to frost and it vanishes.
   */
  variant?: 'card' | 'glass';
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
export const ContactForm = ({
  onSubmit,
  compact = false,
  variant = 'card',
  className,
}: ContactFormProps) => {
  const glass = variant === 'glass';

  const handleSubmit = (e: React.FormEvent<HTMLFormElement>) => {
    e.preventDefault();
    const fd = new FormData(e.currentTarget);
    onSubmit?.({
      fullname: String(fd.get('fullname') ?? ''),
      mobileno: String(fd.get('mobileno') ?? ''),
      emailid: String(fd.get('emailid') ?? ''),
      subject: String(fd.get('subject') ?? ''),
      propertytype: String(fd.get('propertytype') ?? ''),
      location: String(fd.get('location') ?? ''),
      message: String(fd.get('message') ?? ''),
    });
  };

  /* Filled fields with a real border read as "type here"; hairline outlines
     read as decoration. Both variants keep that rule and only change what the
     fill and the border are made of — ink on white, or a lighter pane of the
     same frosted glass the card is cut from.

     Placeholders stay bold but faint in both: the prompt has the weight of the
     answer that replaces it, without being mistaken for one already typed. */
  const field = cn(
    'w-full rounded-xl border-2 transition-all focus:outline-none',
    'placeholder:font-semibold',
    glass
      ? [
          'border-white/25 bg-white/10 text-white placeholder:text-white/45',
          'hover:border-white/45',
          'focus:border-white/80 focus:bg-white/20 focus:ring-4 focus:ring-white/20',
        ]
      : [
          'border-primary/30 bg-primary/[0.04] text-foreground placeholder:text-muted-foreground/45',
          'hover:border-primary/50',
          'focus:border-primary focus:bg-background focus:ring-4 focus:ring-primary/15',
        ],
    compact ? 'px-3.5 py-2.5 text-sm' : 'px-4 py-3 text-[15px]',
  );
  const labelCls = cn(
    'block font-semibold',
    glass ? 'text-white/85' : 'text-foreground',
    compact ? 'mb-1 text-xs' : 'mb-1.5 text-[13px]',
  );
  const chevronCls = glass ? 'text-white/70' : 'text-primary';
  // Same rule, one variant: the empty option is styled like a placeholder.
  const emptyOptionCls = glass
    ? "[&:has(option[value='']:checked)]:font-semibold [&:has(option[value='']:checked)]:text-white/45"
    : "[&:has(option[value='']:checked)]:font-semibold [&:has(option[value='']:checked)]:text-muted-foreground/45";

  const Shell = glass ? GlassCard : 'div';

  return (
    <Shell
      className={cn(
        // GlassCard ships its own gap-6 and py-6; the form is a single grid, so
        // the gap has nothing to space and the padding is set here instead.
        glass
          ? 'gap-0 rounded-2xl shadow-[0_24px_60px_-28px_rgb(0_0_0/0.75)]'
          : 'rounded-2xl border bg-card shadow-[0_24px_60px_-28px_rgb(0_0_0/0.45)]',
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

        <SelectField
          id="c-subject"
          name="subject"
          label="What is this regarding?"
          options={SUBJECTS}
          fieldCls={field}
          labelCls={labelCls}
          chevronCls={chevronCls}
          emptyOptionCls={emptyOptionCls}
        />

        <SelectField
          id="c-propertytype"
          name="propertytype"
          label="Property Type"
          options={PROPERTY_TYPES}
          fieldCls={field}
          labelCls={labelCls}
          chevronCls={chevronCls}
          emptyOptionCls={emptyOptionCls}
        />

        <SelectField
          id="c-location"
          name="location"
          label="Preferred Location"
          options={LOCATIONS}
          fieldCls={field}
          labelCls={labelCls}
          chevronCls={chevronCls}
          emptyOptionCls={emptyOptionCls}
        />

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
        </div>
      </form>
    </Shell>
  );
};
