import { ref } from 'vue'
import { portfolioData } from './data'

// Lang
export const langModel = ref<string>('fr')
export function switchLang () {
  langModel.value = { en: 'fr', fr: 'en' }[langModel.value] ?? 'fr'
}

const get = (obj: object, path: string|string[]) => {
  // If path is not defined or it has false value
  if (!path) return undefined
  // Check if path is string or array. Regex : ensure that we do not have '.' and brackets.
  // Regex explained: https://regexr.com/58j0k
  const pathArray = Array.isArray(path) ? path : path.match(/([^[.\]])+/g)
  // Find value
  const result = pathArray ? pathArray.reduce(
    (prevObj: any, key: string) => prevObj && prevObj[key],
    obj
  ) : undefined
  // If found value is undefined return default value; otherwise return the value
  return result
}

export function useGetText (path: string, source?: object) {
  const val = get(source || portfolioData, path)
  if (val.en || val.fr) {
    return val[langModel.value]
  } else return val
}
