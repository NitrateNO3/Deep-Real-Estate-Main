import { SiteHeader } from '@/components/ui/navbar/site-header';
import { SearchBand } from '@/components/sections/search/search-band';
import { WelcomeSection } from '@/components/sections/welcome/welcome-section';
import { BrandsSection } from '@/components/sections/brands/brands-section';
import { MapsSection } from '@/components/sections/maps/maps-section';
import { StatsBand } from '@/components/sections/stats/stats-band';
import { PropertiesSection } from '@/components/sections/properties/properties-section';
import { ReviewsSection } from '@/components/sections/reviews/reviews-section';
import { ContactSection } from '@/components/sections/contact/contact-section';
import { SiteFooter } from './site-footer';

/** The footer on its own, over a short filler block. */
export const Standalone = () => (
  <div className="min-h-dvh bg-background">
    <div className="grid h-[45vh] place-items-center text-sm text-muted-foreground">
      section above
    </div>
    <SiteFooter />
  </div>
);

/**
 * The full home page — seven screens.
 *   1 · header + search + welcome
 *   2 · ask about property
 *   3 · maps + stats strip
 *   4 · featured & top properties
 *   5 · reviews
 *   6 · contact + process flow
 *   7 · footer
 */
export const HomePage = () => (
  <div className="min-h-dvh scroll-smooth bg-background">
    <section className="flex flex-col lg:h-dvh">
      <div className="shrink-0">
        <SiteHeader activeIndex={0} />
        <SearchBand onSearch={(q) => console.log('search:', q)} />
      </div>
      <div className="lg:min-h-0 lg:flex-1">
        <WelcomeSection fill />
      </div>
    </section>

    <section className="lg:h-dvh">
      <BrandsSection fill />
    </section>

    <section className="flex flex-col lg:min-h-dvh">
      <div className="lg:min-h-0 lg:flex-1">
        <MapsSection fill />
      </div>
      <div className="shrink-0">
        <StatsBand />
      </div>
    </section>

    <section className="lg:h-dvh">
      <PropertiesSection fill />
    </section>

    {/* sized to its content: four cards do not need a whole viewport, and
        padding them out to one would leave a gap between two full screens */}
    <section>
      <ReviewsSection />
    </section>

    <section className="lg:min-h-dvh">
      <ContactSection fill onSubmit={(v) => console.log('contact:', v)} />
    </section>

    {/* sized to its content — the footer is shorter than a viewport */}
    <section>
      <SiteFooter />
    </section>
  </div>
);
