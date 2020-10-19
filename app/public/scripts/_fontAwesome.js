import { library, dom } from "@fortawesome/fontawesome-svg-core";

import * as Icons from "@fortawesome/free-solid-svg-icons";

import * as Brands from "@fortawesome/free-brands-svg-icons";

const iconList = Object.keys(Icons)
  .filter((key) => key !== "fas" && key !== "prefix")
  .map((icon) => Icons[icon]);

const brandsList = Object.keys(Brands)
  .filter((key) => key !== "fab" && key !== "prefix")
  .map((icon) => Brands[icon]);

// add icons
library.add([...iconList, ...brandsList]);

dom.watch();
