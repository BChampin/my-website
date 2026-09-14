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
  | "rose";

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
