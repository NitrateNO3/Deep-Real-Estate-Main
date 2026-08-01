import { SiteHeader } from '@/components/ui/navbar/site-header';
import { SiteFooter } from '@/components/sections/footer/site-footer';
import { DocumentsPage } from './documents-page';

/**
 * The Documents page.
 *   nav → header + search → grouped list of files → footer
 *
 * Documents sits under the nav's "More" menu, so no top-level item takes the
 * limelight here.
 */
export const DocumentsFullPage = () => (
  <div className="min-h-dvh scroll-smooth bg-background">
    <SiteHeader />
    <DocumentsPage />
    <SiteFooter />
  </div>
);
