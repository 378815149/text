<?php
 namespace application\admin\controller; class article extends Base { public function index() { goto V2hzx; FiBnS: if (!$total) { goto b8z_2; } goto KzRhi; gCjun: fbxce: goto IWqGS; KzRhi: $limit = $this->getPageLimit($page, $size); goto ucSwK; IWqGS: $articleMod = D("\x61\x72\x74\x69\x63\x6c\145"); goto Dni8X; e2Tq8: $size = intval($_GPC["\x70\163\151\x7a\x65"]) ? intval($_GPC["\x70\x73\151\x7a\x65"]) : 10; goto IgKC2; Dni8X: $page = max(1, intval($_GPC["\x70\141\x67\x65"])); goto e2Tq8; dj4BI: goto fbxce; goto v2t2B; KLg5K: $status = "\141\154\154"; goto dj4BI; fAc_7: include $this->template("\x77\145\142\x2f\141\x72\x74\x69\143\154\145\x5f\154\151\x73\164"); goto iaoE8; OoX04: if ($status = intval($_GPC["\x73\164\x61\164\165\163"])) { goto Q2Ndr; } goto KLg5K; jaRC6: b8z_2: goto fAc_7; IgKC2: $total = $articleMod->countList($where); goto FiBnS; WGVKW: $where["\x74\151\164\x6c\145"] = array("\x4c\111\x4b\105", "\45" . $keywords . "\45"); goto JAAsG; fGWxh: $pager = pagination($total, $page, $size); goto jaRC6; v2t2B: Q2Ndr: goto PAkTR; PAkTR: $where["\x73\x74\x61\x74\x75\163"] = $status; goto gCjun; V2hzx: global $_W, $_GPC; goto tUs_t; JAAsG: PXYvm: goto OoX04; I90Ym: if (!($keywords = trim($_GPC["\x6b\145\171\x77\157\x72\x64\163"]))) { goto PXYvm; } goto WGVKW; tUs_t: $where = array("\165\156\151\141\143\151\144" => $_W["\x75\156\151\x61\x63\x69\x64"]); goto I90Ym; ucSwK: $list = $articleMod->loadList($where, "\52", $limit, "\141\144\144\x74\151\x6d\145\40\x64\x65\x73\143"); goto fGWxh; iaoE8: } public function add() { goto ccjyd; FtP_N: QshKj: goto yGFVE; jXYP_: $msg = $articleMod->getError(); goto zcpQz; zcpQz: message($msg ? $msg : "\xe6\xb7\273\xe5\x8a\xa0\xe5\244\261\xe8\xb4\xa5", '', "\145\162\x72\157\162"); goto uvJng; ccjyd: global $_W, $_GPC; goto ImkVm; VLKb7: include $this->template("\167\145\x62\57\141\x72\164\x69\143\x6c\x65\137\151\x6e\x66\157"); goto WFxev; jzSW0: $articleMod = D("\141\x72\x74\151\143\x6c\145"); goto auPou; taqGs: Ewpdz: goto FtP_N; WFxev: goto QshKj; goto M6SHT; M6SHT: j6oaN: goto jzSW0; auPou: if ($articleMod->saveData()) { goto XHPvc; } goto jXYP_; pESd7: message("\346\xb7\273\345\212\xa0\xe6\210\x90\345\212\x9f", U("\x61\x72\164\151\143\x6c\x65", array("\x61\143\164" => "\x69\156\144\145\x78")), "\x73\165\143\143\x65\163\x73"); goto taqGs; Y5Qo6: XHPvc: goto pESd7; uvJng: goto Ewpdz; goto Y5Qo6; ImkVm: if (checksubmit("\163\x75\142\x6d\151\164")) { goto j6oaN; } goto VLKb7; yGFVE: } public function edit() { goto fNXFA; ChQGB: $msg = $articleMod->getError(); goto rhwxM; sf4XC: message("\344\277\xae\xe6\224\xb9\xe6\x88\220\xe5\x8a\x9f", U('', array("\x61\143\164" => "\145\144\151\164", "\x61\x72\164\x69\143\154\145\137\x69\x64" => $_GPC["\141\162\x74\151\x63\x6c\x65\x5f\151\144"])), "\163\165\x63\143\x65\163\x73"); goto ZRcC9; PFq8q: message("\345\x8f\x82\346\x95\xb0\351\224\x99\xe8\xaf\xaf", '', "\145\x72\162\x6f\162"); goto GGnln; fSxIK: if (checksubmit("\163\165\x62\155\151\164")) { goto qCF2G; } goto nCL3V; XgyQa: $info = D("\x61\162\x74\151\x63\x6c\x65")->getWhereInfo(array("\141\162\164\151\x63\154\x65\137\151\x64" => $article_id, "\165\156\x69\141\143\x69\144" => $_W["\x75\x6e\x69\x61\x63\x69\x64"])); goto Su876; jBwvl: $articleMod = D("\x61\x72\164\151\143\154\x65"); goto SY0Ps; YYb85: PFOXR: goto sf4XC; JRiov: XkCBL: goto e86i6; nCL3V: if ($article_id = intval($_GPC["\x61\x72\x74\x69\x63\x6c\145\x5f\151\x64"])) { goto jZa7J; } goto PFq8q; ciS2h: qCF2G: goto jBwvl; jYAb_: goto XkCBL; goto ciS2h; N4uyb: goto sow2U; goto YYb85; GGnln: jZa7J: goto XgyQa; fNXFA: global $_W, $_GPC; goto fSxIK; ZRcC9: sow2U: goto JRiov; rhwxM: message($msg ? $msg : "\344\277\256\xe6\x94\xb9\345\xa4\xb1\350\264\xa5", '', "\x65\162\x72\x6f\162"); goto N4uyb; SY0Ps: if ($articleMod->saveData("\x65\144\x69\x74")) { goto PFOXR; } goto ChQGB; Su876: include $this->template("\x77\145\x62\x2f\x61\x72\x74\x69\x63\154\x65\137\151\x6e\146\x6f"); goto jYAb_; e86i6: } public function op() { goto viOXQ; snsfH: Sh9s6: goto VWlxe; viOXQ: global $_W, $_GPC; goto JYxds; YsiJ7: tAAaW: goto HnV5X; lhXDA: nB_82: goto Biw5q; znsxP: message("\xe5\x8f\202\xe6\x95\xb0\351\x94\231\350\257\257", '', "\x65\x72\x72\157\162"); goto snsfH; PxYOh: ohaj3: goto f3n35; ruwo_: goto nB_82; goto PxYOh; U2PI_: $res = D("\x61\162\164\151\143\x6c\x65")->where($where)->setField("\x69\163\137\162\x65\143\x6f\155\155\145\x6e\144", 1); goto uzYB1; HuDuk: message("\345\217\202\xe6\225\xb0\351\224\x99\350\xaf\257", '', "\145\162\x72\x6f\x72"); goto JCbMo; HtjU2: if (!($op == "\x68\x69\144\145")) { goto vKaUk; } goto p68Ux; p68Ux: $res = D("\141\x72\x74\151\x63\x6c\x65")->where($where)->setField("\163\164\141\x74\165\163", 2); goto K7aJn; uzYB1: g8OYB: goto LAdPf; JYxds: if ($article_id = $_GPC["\141\x72\164\x69\143\154\145\137\151\x64"]) { goto Sh9s6; } goto znsxP; LAdPf: if (!($op == "\x75\156\x72\x65\143")) { goto tAAaW; } goto u5FSx; jwwhV: if (in_array($op, array("\x73\150\157\167", "\150\x69\144\145", "\x72\x65\x63", "\x75\156\x72\x65\143"))) { goto OTZ33; } goto HuDuk; JCbMo: OTZ33: goto sAP3d; GLCsk: ezirR: goto HtjU2; t_Lpg: $res = D("\141\162\x74\151\x63\154\145")->where($where)->setField("\163\164\141\164\x75\x73", 1); goto GLCsk; h4gDZ: if (!($op == "\162\145\143")) { goto g8OYB; } goto U2PI_; vEXtW: if (!($op == "\163\150\157\x77")) { goto ezirR; } goto t_Lpg; VWlxe: $op = trim($_GPC["\x6f\160"]); goto jwwhV; K7aJn: vKaUk: goto h4gDZ; sAP3d: $where = array("\x61\162\164\151\x63\x6c\x65\x5f\x69\144" => $article_id, "\165\x6e\x69\141\143\x69\x64" => $_W["\x75\x6e\x69\x61\x63\151\144"]); goto vEXtW; y2TbB: message("\xe6\223\215\344\xbd\234\345\xa4\xb1\xe8\264\245\xef\274\x81", '', "\x65\162\162\x6f\x72"); goto ruwo_; f3n35: message("\346\223\215\344\275\234\346\x88\220\xe5\212\237\xef\xbc\x81", U("\141\x72\164\x69\x63\154\x65", array("\x61\x63\164" => "\x69\156\144\x65\x78")), "\163\165\143\143\x65\x73\163"); goto lhXDA; u5FSx: $res = D("\141\162\164\x69\143\x6c\145")->where($where)->setField("\x69\163\137\162\x65\x63\157\155\x6d\145\x6e\144", 0); goto YsiJ7; HnV5X: if ($res) { goto ohaj3; } goto y2TbB; Biw5q: } public function del() { goto BuvX9; qYf9c: y6IXv: goto syrYq; Gvb7i: if ($article_id = intval($_GPC["\141\x72\x74\x69\143\x6c\145\137\x69\x64"])) { goto kzhvb; } goto GV_Ij; BuvX9: global $_W, $_GPC; goto Gvb7i; mzft_: goto y6IXv; goto XbSMu; jYSQP: message("\xe5\210\xa0\351\x99\xa4\345\244\xb1\xe8\xb4\xa5", '', "\x65\x72\x72\157\x72"); goto mzft_; jwETz: kzhvb: goto y0VD5; y0VD5: if (D("\141\x72\164\151\143\154\x65")->delData($article_id)) { goto s1LqA; } goto jYSQP; XbSMu: s1LqA: goto QYbZ4; GV_Ij: message("\xe5\x8f\x82\346\x95\xb0\351\x94\x99\350\xaf\257", '', "\145\x72\x72\157\162"); goto jwETz; QYbZ4: message("\xe5\x88\240\xe9\231\xa4\346\x88\x90\345\x8a\x9f", U("\141\162\164\x69\143\154\145", array("\x61\143\164" => "\151\156\x64\x65\170")), "\163\x75\143\x63\x65\x73\163"); goto qYf9c; syrYq: } public function batchDel() { goto HXAQ5; M5yMl: S_DiK: goto In62X; In62X: $articleMod = D("\x61\x72\164\x69\x63\154\x65"); goto NhCUd; ot_Zf: message("\345\217\202\xe6\225\260\xe9\x94\231\350\257\257", '', "\145\162\162\x6f\162"); goto M5yMl; af4er: if ($res) { goto VjQNr; } goto bnuBy; HXAQ5: global $_W, $_GPC; goto VOWRP; bnuBy: message("\346\223\x8d\xe4\275\234\345\244\xb1\350\264\245\xef\xbc\201", '', "\145\x72\x72\157\x72"); goto Pn59d; VOWRP: if ($article_id = $_GPC["\141\x72\164\x69\143\x6c\x65\x5f\151\x64"]) { goto S_DiK; } goto ot_Zf; qX7hg: VjQNr: goto nscq2; Pn59d: goto WTS6h; goto qX7hg; NhCUd: foreach ($article_id as $v) { $res = $articleMod->delData($v); mDz30: } goto uCq2t; nscq2: message("\346\x93\x8d\344\xbd\x9c\xe6\210\x90\345\212\237\xef\274\201", U('', array("\141\143\164" => "\x69\x6e\144\145\170")), "\163\x75\143\x63\x65\x73\x73"); goto HwUP3; HwUP3: WTS6h: goto hnJ7e; uCq2t: pmSyT: goto af4er; hnJ7e: } }