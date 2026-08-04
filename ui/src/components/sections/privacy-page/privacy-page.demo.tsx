import { SiteHeader } from '@/components/ui/navbar/site-header';
import { SiteFooter } from '@/components/sections/footer/site-footer';
import { PrivacyPage } from './privacy-page';

/**
 * The Privacy Policy page.
 *   nav → head + index rail → ten sections → CTA → footer
 */
export const PrivacyFullPage = () => (
  <div className="min-h-dvh scroll-smooth bg-background">
    {/* activeIndex 5 is "More", which is where Privacy Policy lives */}
    <SiteHeader activeIndex={5} />
    <PrivacyPage />
    <SiteFooter />
  </div>
);
