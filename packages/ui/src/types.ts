export interface Translatable {
  en?: string;
  fr?: string;
  [lang: string]: string | undefined;
}

export interface TimelineItem {
  title: string | Translatable;
  dates: string;
  institution: string | Translatable;
  location: string;
  link?: string;
}

export interface CarouselItem {
  label: string;
  icon: string;
  link: string;
}
