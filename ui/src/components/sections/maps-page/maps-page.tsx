import { useMemo, useState } from 'react';
import { ImageGallery, type GalleryItem } from '@/components/ui/image-gallery/image-gallery';
import { Lightbox } from '@/components/ui/image-gallery/lightbox';
import { mapSections, type MapSection } from './maps-data';
import { cn } from '@/lib/utils';

export type MapsPageProps = {
  sections?: MapSection[];
  className?: string;
};

/**
 * Maps page.
 *
 * Section order and contents mirror the live site's /maps/ page exactly.
 * The lightbox indexes across the *flattened* list rather than per section, so
 * the arrow keys keep going from the last map of one section into the first of
 * the next instead of dead-ending.
 */
export const MapsPage = ({ sections = mapSections, className }: MapsPageProps) => {
  const [openIndex, setOpenIndex] = useState<number | null>(null);

  const flat = useMemo<GalleryItem[]>(
    () => sections.flatMap((s) => s.maps),
    [sections],
  );
  const indexOf = useMemo(() => {
    const m = new Map<string, number>();
    flat.forEach((item, i) => m.set(item.thumb, i));
    return m;
  }, [flat]);

  const total = flat.length;

  return (
    <div className={cn('w-full bg-background', className)}>
      {/* page header */}
      <section className="border-b bg-muted/40">
        <div className="mx-auto w-full max-w-[1400px] px-5 py-14 sm:px-8 sm:py-16">
          <div className="flex items-center gap-3">
            <span className="h-px w-8 bg-primary" />
            <p className="text-xs font-semibold uppercase tracking-[0.18em] text-primary">
              Sector maps
            </p>
          </div>
          <h1 className="mt-4 max-w-3xl text-4xl font-bold leading-[1.05] tracking-tight text-foreground sm:text-5xl lg:text-[3.25rem]">
            Every map of Gurgaon, in one place
          </h1>
          <p className="mt-5 max-w-2xl text-[17px] leading-[1.65] text-muted-foreground">
            Master plans, DLF phases, HUDA sectors and builder projects — down to plot numbers.
            Tap any map to open it full size.
          </p>
          <p className="mt-6 text-sm font-semibold text-foreground">
            {total} maps across {sections.length} sections
          </p>
        </div>
      </section>

      {/* one block per section, in the live site's order */}
      {sections.map((section, i) => (
        <section
          key={section.title}
          id={section.title.toLowerCase().replace(/\s+/g, '-')}
          className={cn('w-full', i % 2 === 1 && 'bg-muted/30')}
        >
          <div className="mx-auto w-full max-w-[1400px] px-5 py-14 sm:px-8 sm:py-16">
            <div className="mb-8 flex flex-wrap items-baseline justify-between gap-3 border-b pb-4">
              <h2 className="text-2xl font-bold tracking-tight text-foreground sm:text-3xl">
                {section.title}
              </h2>
              <span className="text-sm text-muted-foreground">
                {section.maps.length} {section.maps.length === 1 ? 'map' : 'maps'}
              </span>
            </div>

            <ImageGallery
              items={section.maps}
              onOpen={(item) => setOpenIndex(indexOf.get(item.thumb) ?? 0)}
            />
          </div>
        </section>
      ))}

      <Lightbox
        items={flat}
        index={openIndex}
        onClose={() => setOpenIndex(null)}
        onIndexChange={setOpenIndex}
      />
    </div>
  );
};
