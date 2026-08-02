import { StarButton } from '@/components/ui/star-button';
import { cn } from '@/lib/utils';

export type IndexCtaProps = {
  heading?: string;
  body?: string;
  ctaLabel?: string;
  ctaHref?: string;
  className?: string;
};

/**
 * The closing band for an index page.
 *
 * Maps and Documents are the only pages that used to simply run out of content
 * and hit the footer. Every other page hands off to a CTA first, and that
 * hand-off is a large part of why they feel finished.
 */
export const IndexCta = ({
  heading = 'Can’t find what you need?',
  body = 'Tell us the sector or the document and we will send it across.',
  ctaLabel = 'Talk to us',
  ctaHref = '#contact-page',
  className,
}: IndexCtaProps) => (
  <section className={cn('w-full bg-[#0b1d2a]', className)}>
    <div className="mx-auto flex w-full max-w-[1400px] flex-col items-start gap-6 px-5 py-14 sm:px-8 md:flex-row md:items-center md:justify-between">
      <div>
        <h2 className="text-2xl font-bold tracking-tight text-white sm:text-3xl">{heading}</h2>
        <p className="mt-2 max-w-xl text-[15px] leading-[1.6] text-white/65">{body}</p>
      </div>
      <StarButton
        href={ctaHref}
        lightColor="#FAFAFA"
        className="h-12 shrink-0 px-7 text-[15px] font-semibold"
      >
        {ctaLabel}
      </StarButton>
    </div>
  </section>
);
