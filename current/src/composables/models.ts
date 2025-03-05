export interface Tech {
  label: string
  icon: string
  link: string
}

export interface Translatable {
  en?: string
  fr?: string
}

export interface Project {
  title: string|Translatable
  link?: string
  icon?: string
  cover?: string
  description?: Translatable
  context?: Translatable
  techs?: Tech[]
  gallery?: string[]
}

export interface TimelineEvent {
  title: string|Translatable
  dates: string
  institution: string|Translatable
  location: string
  link?: string
}
