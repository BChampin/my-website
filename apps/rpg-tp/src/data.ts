import { ref } from "vue";
import {
  faBluesky,
  faDiscord,
  faInstagram,
  faTiktok,
  faTwitch,
  faTwitter,
  faYoutube,
} from "@fortawesome/free-brands-svg-icons";
import { rpgTpData } from "./rpg-tp.data";
import type { TpData, TpPlayer, TpTeam } from "./types";

const data = ref<TpData>(rpgTpData);

export function useRpgTpData() {
  return data;
}

// Shared "find by id" joins, used from several components' computeds so the
// lookup + null-handling only has to be written once.
export function findTeam(data: TpData | null, id: string | undefined): TpTeam | undefined {
  return id ? data?.teams.find((t) => t.id === id) : undefined;
}

export function findPlayer(data: TpData | null, id: string): TpPlayer | undefined {
  return data?.players.find((p) => p.id === id);
}

const SOCIAL_ICONS = [
  { key: "twitch", icon: faTwitch },
  { key: "twitter", icon: faTwitter },
  { key: "discord", icon: faDiscord },
  { key: "youtube", icon: faYoutube },
  { key: "bluesky", icon: faBluesky },
  { key: "instagram", icon: faInstagram },
  { key: "tiktok", icon: faTiktok },
] as const;

// Shared with PlayerCard and PlayerView so the icon-per-social-key mapping
// only lives in one place.
export function playerSocials(player: TpPlayer) {
  return SOCIAL_ICONS.map((s) => ({ ...s, href: player[s.key] })).filter(
    (s): s is typeof s & { href: string } => !!s.href,
  );
}
