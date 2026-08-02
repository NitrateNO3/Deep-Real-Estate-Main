import { SiteHeader } from '@/components/ui/navbar/site-header';
import { SiteFooter } from '@/components/sections/footer/site-footer';
import { Faqs } from './faqs-section';

/** The section on its own, for judging it in isolation. */
export const Standalone = () => <Faqs />;

/**
 * The FAQs page.
 *   nav → accordion of the live site's eight questions → footer
 *
 * activeIndex 2 puts the limelight on FAQs.
 */
export const FaqsFullPage = () => (
  <div className="min-h-dvh scroll-smooth bg-background">
    <SiteHeader activeIndex={2} />
    <Faqs />
    <SiteFooter />
  </div>
);
