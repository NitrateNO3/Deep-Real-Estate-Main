import { useMemo, useState } from 'react';
import { documentGroups, documents, type DocumentItem } from './documents-data';
import { cn } from '@/lib/utils';

export type DocumentsPageProps = {
  items?: DocumentItem[];
  /** Where the files live. Overridable so the same page can point at a CDN. */
  basePath?: string;
  className?: string;
};

const DocIcon = ({ className }: { className?: string }) => (
  <svg viewBox="0 0 24 24" className={className} fill="none" stroke="currentColor" strokeWidth="1.6" strokeLinecap="round" strokeLinejoin="round">
    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
    <path d="M14 2v6h6" />
  </svg>
);

const OpenIcon = ({ className }: { className?: string }) => (
  <svg viewBox="0 0 24 24" className={className} fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round">
    <path d="M15 3h6v6" />
    <path d="M10 14 21 3" />
    <path d="M21 14v5a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5" />
  </svg>
);

const SearchIcon = ({ className }: { className?: string }) => (
  <svg viewBox="0 0 24 24" className={className} fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round">
    <circle cx="11" cy="11" r="7" />
    <path d="m20 20-3.2-3.2" />
  </svg>
);

/**
 * One document, as a full-width bar.
 *
 * The whole row is the link rather than just the button on the right: on a list
 * this wide the title and the action end up a screen apart, and making the user
 * travel to the far edge for every file is a poor trade. The button stays as
 * the visible affordance.
 */
const DocumentRow = ({ item, href }: { item: DocumentItem; href: string }) => (
  <a
    href={href}
    target="_blank"
    rel="noreferrer"
    className="group flex items-center gap-4 px-4 py-4 transition-colors hover:bg-muted/60 focus-visible:bg-muted/60 focus-visible:outline-none sm:gap-5 sm:px-6"
  >
    <span
      aria-hidden="true"
      className="relative grid h-11 w-11 shrink-0 place-items-center rounded-xl bg-primary/10 text-primary"
    >
      <DocIcon className="h-5 w-5" />
    </span>

    <span className="min-w-0 flex-1">
      <span className="block truncate text-[15px] font-semibold text-foreground group-hover:text-primary sm:text-base">
        {item.title}
      </span>
      <span className="mt-1 flex flex-wrap items-center gap-x-2 gap-y-1 text-[13px] text-muted-foreground">
        <span className="font-medium uppercase tracking-wider">{item.ext}</span>
        <span aria-hidden="true" className="text-muted-foreground/50">
          ·
        </span>
        <span>{item.sizeKb} KB</span>
        <span aria-hidden="true" className="text-muted-foreground/50">
          ·
        </span>
        <span>{item.category}</span>
      </span>
    </span>

    {/* not a nested <a> — the row is the link, this is just its affordance */}
    <span className="inline-flex shrink-0 items-center gap-2 rounded-full border border-foreground/20 px-4 py-2 text-[13px] font-semibold text-foreground transition-colors group-hover:border-primary group-hover:bg-primary group-hover:text-primary-foreground">
      <OpenIcon className="h-4 w-4" />
      <span className="hidden sm:inline">View</span>
    </span>
  </a>
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
      <section className="border-b bg-muted/40">
        <div className="mx-auto w-full max-w-[1400px] px-5 py-14 sm:px-8 sm:py-16">
          <div className="flex items-center gap-3">
            <span className="h-px w-8 bg-primary" />
            <p className="text-xs font-semibold uppercase tracking-[0.18em] text-primary">
              Documents
            </p>
          </div>
          <h1 className="mt-4 max-w-3xl text-4xl font-bold leading-[1.05] tracking-tight text-foreground sm:text-5xl lg:text-[3.25rem]">
            Every form a property transaction asks for
          </h1>
          <p className="mt-5 max-w-2xl text-[17px] leading-[1.65] text-muted-foreground">
            Drafted and checked against MCG and Haryana Government requirements, for
            registration, transfer and possession. Open any one to download it and edit it in
            your own word processor.
          </p>

          <div className="mt-8 flex max-w-md items-center gap-3 rounded-full border bg-background px-4 py-2.5 focus-within:border-primary">
            <SearchIcon className="h-4 w-4 shrink-0 text-muted-foreground" />
            <input
              type="search"
              value={query}
              onChange={(e) => setQuery(e.target.value)}
              placeholder="Search documents"
              aria-label="Search documents"
              className="w-full bg-transparent text-[15px] text-foreground placeholder:text-muted-foreground focus:outline-none"
            />
          </div>

          <p className="mt-4 text-sm font-semibold text-foreground">
            {matches.length} of {items.length} documents
          </p>
        </div>
      </section>

      {/* ------------------------------------------------------------- list */}
      <div className="mx-auto w-full max-w-[1400px] px-5 py-14 sm:px-8 sm:py-16">
        {groups.length === 0 ? (
          <p className="py-16 text-center text-[15px] text-muted-foreground">
            No document matches “{query.trim()}”.
          </p>
        ) : (
          <div className="space-y-12">
            {groups.map((group) => (
              <section key={group.category}>
                <div className="flex flex-wrap items-baseline justify-between gap-3 border-b pb-4">
                  <div>
                    <h2 className="text-2xl font-bold tracking-tight text-foreground sm:text-3xl">
                      {group.category}
                    </h2>
                    <p className="mt-1.5 text-[15px] text-muted-foreground">{group.blurb}</p>
                  </div>
                  <span className="text-sm text-muted-foreground">
                    {group.docs.length} {group.docs.length === 1 ? 'document' : 'documents'}
                  </span>
                </div>

                <div className="mt-5 divide-y overflow-hidden rounded-2xl border bg-card">
                  {group.docs.map((item) => (
                    <DocumentRow
                      key={item.file}
                      item={item}
                      href={`${basePath}/${encodeURIComponent(item.file)}`}
                    />
                  ))}
                </div>
              </section>
            ))}
          </div>
        )}
      </div>
    </div>
  );
};
