<?php
 namespace application\admin\controller; class system extends Base { public function site() { goto vgrzR; lkXmC: message("\xe6\x8f\220\xe4\272\244\345\244\261\350\xb4\xa5", '', "\x65\x72\x72\157\162"); goto RysGp; o8hKJ: goto GYxSe; goto yR4fT; jTP_K: DEp4R: goto oFrGb; P1f1H: $configMod = D("\143\x6f\x6e\x66\x69\x67"); goto qXBUR; yR4fT: NSJf4: goto k0z0c; vgrzR: global $_W, $_GPC; goto P1f1H; oFrGb: GYxSe: goto rEnIe; rEnIe: include $this->template("\x77\145\x62\x2f\143\x6f\x6e\x66\x69\x67\137\x73\x69\164\x65"); goto Lolgb; ksD9k: message("\xe6\217\x90\344\xba\244\xe6\x88\x90\345\212\237", U('', array("\141\x63\164" => "\x73\151\164\x65")), "\163\x75\143\x63\145\x73\163"); goto jTP_K; RysGp: goto DEp4R; goto mHv7f; mHv7f: hXkcu: goto ksD9k; J_Ca6: $info = $configMod->getInfo(); goto o8hKJ; qXBUR: if (checksubmit("\163\x75\x62\x6d\x69\x74")) { goto NSJf4; } goto J_Ca6; k0z0c: if ($configMod->saveData()) { goto hXkcu; } goto lkXmC; Lolgb: } public function index() { goto W3egL; DFnVV: CZbh0: goto KUZAC; B742A: if (checksubmit("\163\165\142\x6d\x69\x74")) { goto H97cG; } goto Qjt36; Cfutb: goto CZbh0; goto d7_Rf; EflZP: goto l2vWa; goto cvhW5; d7_Rf: mliWo: goto qkPUb; qawMZ: if ($configMod->saveData()) { goto mliWo; } goto nF17X; cvhW5: H97cG: goto qawMZ; NwZtM: $configMod = D("\143\x6f\x6e\x66\151\x67"); goto B742A; qkPUb: message("\346\x8f\x90\xe4\272\244\xe6\x88\x90\345\x8a\x9f", U('', array("\x61\x63\164" => "\151\x6e\144\x65\x78")), "\x73\165\143\x63\145\x73\x73"); goto DFnVV; nF17X: message("\xe6\217\220\344\272\244\xe5\244\xb1\xe8\264\xa5", '', "\x65\162\162\157\162"); goto Cfutb; Qjt36: $info = $configMod->getInfo(); goto EflZP; cGxE8: include $this->template("\x77\x65\142\x2f\x63\157\x6e\146\x69\147\x5f\x69\156\144\145\170"); goto G7WmI; W3egL: global $_W, $_GPC; goto NwZtM; KUZAC: l2vWa: goto cGxE8; G7WmI: } public function about() { goto cbF9t; W2Exd: message("\xe6\217\220\344\272\244\346\210\x90\xe5\x8a\237", U('', array("\x61\x63\164" => "\141\x62\157\x75\164")), "\163\165\x63\143\145\163\163"); goto VwnYi; rJnnD: vzWEJ: goto DEwYE; WKe7g: E4wa4: goto W2Exd; BOn6u: if (checksubmit("\x73\x75\x62\155\151\x74")) { goto F_s3L; } goto Xqnsn; vjTpg: F_s3L: goto EiXr3; cbF9t: global $_W, $_GPC; goto LLo2p; DEwYE: include $this->template("\x77\x65\142\57\x63\x6f\156\146\151\x67\137\141\142\x6f\x75\164"); goto Zn1gk; LLo2p: $configMod = D("\x63\x6f\x6e\x66\151\x67"); goto BOn6u; GVNsQ: message("\xe6\217\x90\xe4\272\244\345\244\xb1\xe8\xb4\245", '', "\x65\x72\x72\x6f\162"); goto cobT8; VwnYi: KJMvC: goto rJnnD; Xqnsn: $info = $configMod->getInfo(); goto Jd5wx; EiXr3: if ($configMod->saveData()) { goto E4wa4; } goto GVNsQ; cobT8: goto KJMvC; goto WKe7g; Jd5wx: goto vzWEJ; goto vjTpg; Zn1gk: } }