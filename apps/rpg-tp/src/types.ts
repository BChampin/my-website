export type TpOrg = {
  name: string;
  roles: string;
  exchange?: string;
};

export type TeamColor =
  | "pink"
  | "yellow"
  | "blue"
  | "red"
  | "emerald"
  | "lime"
  | "fuchsia"
  | "rose"
  | "orange"
  | "grey"
  | "white"
  | "green"
  | "brown";

// Tailwind's own -100/-700 palette shades, applied inline: a color picked at
// runtime from a lookup table isn't a literal `class="..."` Tailwind's
// content scanner can reliably pick up (confirmed: worked in a production
// build here, but silently produced colorless badges in dev — see
// GradeChip/FameChip in apps/pvm-rpg for the same pattern used for the same
// reason). Shared by TeamBadge and TeamView.
export const TEAM_COLOR_PALETTE: Record<TeamColor, { bg: string; text: string; ring: string }> = {
  pink: { bg: "#fce7f3", text: "#be185d", ring: "rgb(190 24 93 / 0.1)" },
  yellow: { bg: "#fef9c3", text: "#a16207", ring: "rgb(161 98 7 / 0.1)" },
  blue: { bg: "#dbeafe", text: "#1d4ed8", ring: "rgb(29 78 216 / 0.1)" },
  red: { bg: "#fee2e2", text: "#b91c1c", ring: "rgb(185 28 28 / 0.1)" },
  emerald: { bg: "#d1fae5", text: "#047857", ring: "rgb(4 120 87 / 0.1)" },
  lime: { bg: "#ecfccb", text: "#4d7c0f", ring: "rgb(77 124 15 / 0.1)" },
  fuchsia: { bg: "#fae8ff", text: "#a21caf", ring: "rgb(162 28 175 / 0.1)" },
  rose: { bg: "#ffe4e6", text: "#be123c", ring: "rgb(190 18 60 / 0.1)" },
  orange: { bg: "#ffedd5", text: "#c2410c", ring: "rgb(194 65 12 / 0.1)" },
  grey: { bg: "#f3f4f6", text: "#374151", ring: "rgb(55 65 81 / 0.1)" },
  white: { bg: "#ffffff", text: "#1f2937", ring: "rgb(31 41 55 / 0.15)" },
  green: { bg: "#dcfce7", text: "#15803d", ring: "rgb(21 128 61 / 0.1)" },
  brown: { bg: "#f0e0d0", text: "#78350f", ring: "rgb(120 53 15 / 0.1)" },
};

export type TpTeam = {
  id: string;
  name: string;
  color: TeamColor;
  emoji: string;
};

export type TpPlayer = {
  id: string;
  name: string;
  quote: string;
  teamId?: string;
  twitch?: string;
  twitter?: string;
  discord?: string;
  youtube?: string;
  bluesky?: string;
  instagram?: string;
  tiktok?: string;
};

export type TpTime = {
  playerId: string;
  mapId: string;
  time: string;
  replay?: string;
  teamId?: string;
  editionId?: string;
};

export type TmMap = {
  id: string;
  name: string;
  author: string;
  exchangeId: string;
  authorTime: string;
  difficulty: string;
};

export type TpEdition = {
  id: string;
  date: string;
  mapsIds: string[];
  // The data only ever carries a single winning team, despite the plural name.
  winnerTeamId?: string;
  announcementTweet?: string;
  announcementTrailer?: boolean;
  announcementPicture?: boolean;
  recapVideos?: string[];
};

export type TpData = {
  org: TpOrg[];
  teams: TpTeam[];
  players: TpPlayer[];
  times: TpTime[];
  maps: TmMap[];
  editions: TpEdition[];
};
