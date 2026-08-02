import { useMemo, useState } from 'react';
import GlowingSearchBar from '@/components/ui/search-bar/animated-glowing-search-bar';
import { InteractiveHoverButton } from '@/components/ui/interactive-hover-button';
import { SectionRail } from '@/components/ui/section-rail/section-rail';
import { IndexCta } from '@/components/sections/index-cta/index-cta';
import { documentGroups, documents, type DocumentItem } from './documents-data';
import { cn } from '@/lib/utils';

export type DocumentsPageProps = {
  items?: DocumentItem[];
  /** Where the files live. Overridable so the same page can point at a CDN. */
  basePath?: string;
  className?: string;
};

const groupId = (category: string) => `docs-${category.toLowerCase()}`;

const DocIcon = ({ className }: { className?: string }) => (
  <svg viewBox="0 0 24 24" className={className} fill="none" stroke="currentColor" strokeWidth="1.6" strokeLinecap="round" strokeLinejoin="round">
    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
    <path d="M14 2v6h6" />
  </svg>
);

/**
 * One document, as a full-width bar.
 *
 * The row is a div rather than one big link: the View control is itself an
 * anchor, and an anchor inside an anchor is invalid and unreachable by
 * keyboard. The title stays a link too, so either end of the row opens the
 * file.
 */
const DocumentRow = ({ item, href }: { item: DocumentItem; href: string }) => (
  <div className="group/row flex items-center gap-4 px-4 py-4 transition-colors hover:bg-muted/60 sm:gap-5 sm:px-6">
    <span
      aria-hidden="true"
      className="relative grid h-11 w-11 shrink-0 place-items-center rounded-xl bg-primary/10 text-primary"
    >
      <DocIcon className="h-5 w-5" />
    </span>

    <div className="min-w-0 flex-1">
      <a
        href={href}
        target="_blank"
        rel="noreferrer"
        className="block truncate text-[15px] font-semibold text-foreground transition-colors hover:text-primary focus-visible:text-primary focus-visible:outline-none group-hover/row:text-primary sm:text-base"
      >
        {item.title}
      </a>
      <p className="mt-1 flex flex-wrap items-center gap-x-2 gap-y-1 text-[13px] text-muted-foreground">
        <span className="font-medium uppercase tracking-wider">{item.ext}</span>
        <span aria-hidden="true" className="text-muted-foreground/50">
          ·
        </span>
        <span>{item.sizeKb} KB</span>
        <span aria-hidden="true" className="text-muted-foreground/50">
          ·
        </span>
        <span>{item.category}</span>
      </p>
    </div>

    <InteractiveHoverButton
      href={href}
      target="_blank"
      rel="noreferrer"
      text="View"
      aria-label={`View ${item.title}`}
      className="w-24 shrink-0 text-[13px] sm:w-28 sm:text-sm"
    />
  </div>
);

/**
 * Documents page.
 *
 * Every form the live site publishes, in one flat vertical list — full-width
 * rows rather than a card grid, because these are files and a file list reads
 * fastest as lines. "View" opens the file in a new tab, which for .doc/.docx
 * means the browser hands it to whatever the user has set as their document
 * opener (WPS, Word, Pages).
 */
export const DocumentsPage = ({
  items = documents,
  basePath = '/docs',
  className,
}: DocumentsPageProps) => {
  const [query, setQuery] = useState('');

  const matches = useMemo(() => {
    const q = query.trim().toLowerCase();
    if (!q) return items;
    return items.filter(
      (d) => d.title.toLowerCase().includes(q) || d.category.toLowerCase().includes(q),
    );
  }, [items, query]);

  const groups = useMemo(
    () =>
      documentGroups
        .map((g) => ({ ...g, docs: matches.filter((d) => d.category === g.category) }))
        .filter((g) => g.docs.length > 0),
    [matches],
  );

  return (
    <div className={cn('w-full bg-background', className)}>
      {/* -------------------------------------------------------- page head */}
      {/* same backdrop treatment as the maps page and the home page's dark
          bands: photo at opacity, then a gradient to even out the ground */}
      <section className="relative isolate w-full overflow-hidden border-b bg-[#06121b]">
        <img
          src="/img/bg/city.jpg"
          alt=""
          aria-hidden="true"
          className="absolute inset-0 -z-10 h-full w-full object-cover object-center opacity-45"
        />
        <div
          aria-hidden="true"
          className="absolute inset-0 -z-10 bg-[linear-gradient(180deg,rgba(6,18,27,0.86)_0%,rgba(6,18,27,0.70)_45%,rgba(6,18,27,0.94)_100%)]"
        />

        <div className="mx-auto w-full max-w-[1400px] px-5 py-14 sm:px-8 sm:py-16">
          <div className="flex items-center gap-3">
            <span className="h-px w-8 bg-sky-400" />
            <p className="text-xs font-semibold uppercase tracking-[0.18em] text-sky-400">
              Documents
            </p>
          </div>
          <h1 className="mt-4 max-w-3xl text-4xl font-bold leading-[1.05] tracking-tight text-white sm:text-5xl lg:text-[3.25rem]">
            Documents for property transactions
          </h1>
          {/* the old site's own explanation of what these are, tidied */}
          <p className="mt-5 max-w-2xl text-[17px] leading-[1.65] text-white/75">
            Prepared and checked against the Department of MCG and Haryana Government
            requirements for the different sections of property law. Open one to download it
            and fill it in.
          </p>

          {/* the home page's search bar, filtering as you type */}
          <div className="mt-8 max-w-xl">
            <GlowingSearchBar
              placeholder="Search documents"
              label="Search documents"
              onQueryChange={setQuery}
              onSearch={setQuery}
            />
          </div>

          <p className="mt-6 text-sm font-semibold text-white">
            {matches.length} of {items.length} documents
          </p>
        </div>
      </section>

      {/* index rail — same component and position as the maps page */}
      <SectionRail
        items={[
          { label: 'All', count: matches.length },
          ...groups.map((g) => ({
            id: groupId(g.category),
            label: g.category,
            count: g.docs.length,
          })),
        ]}
      />

      {/* ------------------------------------------------------------- list */}
      {groups.length === 0 ? (
        <div className="mx-auto w-full max-w-[1400px] px-5 py-24 sm:px-8">
          <p className="text-center text-[15px] text-muted-foreground">
            No document matches “{query.trim()}”.
          </p>
        </div>
      ) : (
        groups.map((group, i) => (
          <section
            key={group.category}
            id={groupId(group.category)}
            /* clears the header and the rail above it */
            className={cn('w-full scroll-mt-[8.5rem]', i % 2 === 1 && 'bg-muted/30')}
          >
            <div className="mx-auto w-full max-w-[1400px] px-5 py-14 sm:px-8 sm:py-16">
              {/* heading and count, nothing else — the eyebrow rule is the
                  home page's device for introducing a new idea, and repeating
                  it on three consecutive groups of the same list is a tic */}
              <div className="mb-8 flex flex-wrap items-end justify-between gap-3 border-b pb-5">
                <h2 className="text-3xl font-bold tracking-tight text-foreground sm:text-4xl">
                  {group.category}
                </h2>
                <span className="pb-1 text-sm text-muted-foreground">
                  {group.docs.length} {group.docs.length === 1 ? 'document' : 'documents'}
                </span>
              </div>

              <div className="divide-y overflow-hidden rounded-2xl border bg-card">
                {group.docs.map((item) => (
                  <DocumentRow
                    key={item.file}
                    item={item}
                    href={`${basePath}/${encodeURIComponent(item.file)}`}
                  />
                ))}
              </div>
            </div>
          </section>
        ))
      )}

      <IndexCta
        heading="Need a document we don’t list?"
        body="Tell us which form you need and we will send it across."
      />
    </div>
  );
};
