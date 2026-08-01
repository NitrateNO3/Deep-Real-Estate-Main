import { SiteHeader } from '@/components/ui/navbar/site-header';
import { SiteFooter } from '@/components/sections/footer/site-footer';
import { MapsPage } from './maps-page';

/**
 * The Maps page.
 *   nav (limelight on Maps) → 8 map sections → footer
 *
 * No scroll-snap here. The page is a long browsable index of 74 maps; snapping
 * it to viewport-sized chunks would fight someone scanning for one sector.
 */
export const MapsFullPage = () => (
  <div className="min-h-dvh scroll-smooth bg-background">
    {/* activeIndex 3 puts the limelight on Maps */}
    <SiteHeader activeIndex={3} />
    <MapsPage />
    <SiteFooter />
  </div>
);
