<?php
 goto ME0S4; L3XBT: $resultData["\147\x6f\x6f\144\163\114\151\163\164"] = $goodsList; goto LbfhO; OB6DW: logging_run("\141\x61\x61\75\75\75"); goto HiiNL; PFNGU: $articleSql = "\163\x65\x6c\145\143\164\40\x2a\x20\146\162\x6f\155\x20" . tablename("\160\x65\x61\163\137\143\x6d\x73\137\x61\x72\x74\x69\x63\154\145") . "\x20\x20\x77\x68\145\162\x65\40\x20\146\137\x73\x74\141\x74\x65\x3d\x20\x30\x20\x20\15\xa\40\x20\x20\x20\x20\x20\x20\40\x20\40\40\x20\x20\x20\40\x20\x20\40\x20\40\40\x20\40\40\40\40\40\40\40\40\40\x20\40\40\x20\x20\x20\x20\40\x20\40\40\x20\x20\x20\40\40\40\157\162\144\145\x72\x20\142\171\40\x69\144\x20\x64\x65\x73\143\x20\154\x69\155\151\x74\x20\60\40\54\40\x35\x20"; goto XjsE0; dL4dK: $sysconfigList = pdo_fetchall($sysconfigSql); goto A_E3c; HiiNL: $sysconfigSql = "\x73\x65\x6c\145\x63\164\x20\40\x66\x5f\166\x61\x72\156\141\x6d\x65\40\54\x20\146\137\x76\141\154\165\145\x20\x20\146\x72\x6f\155\x20" . tablename("\160\145\x61\163\x5f\143\x6d\x73\137\x73\x79\x73\x63\157\x6e\x66\151\147"); goto dL4dK; DCuBF: $resultData["\142\x61\156\x6e\x65\x72\114\x69\x73\164"] = $bannerList; goto bnonj; k0iSD: $bannerList = pdo_fetchall($bannerSql); goto wFRYJ; TLFDc: $goodsList = pdo_fetchall($goodsSql); goto PFNGU; XjsE0: $articleList = pdo_fetchall($articleSql); goto tBnda; LbfhO: $resultData["\x61\x72\x74\151\x63\154\145\114\151\163\x74"] = $articleList; goto RJqWi; ME0S4: global $_GPC, $_W; goto MpDAe; MpDAe: load()->func("\x6c\157\147\x67\151\x6e\x67"); goto OB6DW; A_E3c: $bannerSql = "\x73\145\154\145\143\164\x20\x2a\40\x66\162\x6f\155\40" . tablename("\x70\x65\141\163\x5f\143\x6d\x73\137\x62\141\156\x6e\145\x72") . "\40\40\167\x68\145\x72\145\x20\x20\x66\137\163\164\141\164\145\x3d\40\60\x20\xd\xa\40\40\40\40\x20\40\40\40\x20\x20\40\40\x20\40\40\40\x20\40\x20\40\x20\x20\x6f\162\x64\145\162\40\142\171\40\x69\144\x20\x64\145\163\x63\40\x6c\151\x6d\x69\164\40\x30\40\x2c\x20\61\60"; goto k0iSD; wFRYJ: $goodsSql = "\x73\x65\x6c\145\143\164\x20\52\x20\146\162\x6f\155\x20" . tablename("\160\x65\x61\163\137\x63\x6d\x73\x5f\147\157\157\144\x73") . "\x20\40\167\x68\x65\162\145\x20\x20\146\137\163\164\141\164\145\x3d\40\60\x20\x61\x6e\x64\x20\146\137\x69\163\137\x69\156\x64\x65\170\x3d\x30\x20\15\xa\x20\40\40\x20\40\40\x20\40\40\40\x20\40\x20\x20\40\40\x20\40\x6f\x72\144\x65\x72\x20\142\x79\x20\151\144\x20\144\145\x73\143\x20\x6c\151\x6d\151\164\40\60\x20\54\x20\62"; goto TLFDc; RJqWi: $resultData["\x61\164\164\x61\143\150\x75\162\x6c"] = $_W["\x61\x74\164\x61\x63\150\x75\x72\154"]; goto DCuBF; tBnda: $resultData["\163\x79\163\x63\x6f\156\146\x69\x67\114\x69\x73\164"] = $sysconfigList; goto L3XBT; bnonj: return $this->result(0, "\350\216\xb7\xe5\217\x96\346\225\xb0\346\215\256\xe6\x88\x90\345\212\237", $resultData);