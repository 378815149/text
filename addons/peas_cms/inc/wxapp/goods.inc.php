<?php
 goto zQQq5; K2DWQ: thQKl: goto TZ5O1; pIgc_: $sql .= "\40\x6f\x72\144\x65\162\x20\x62\x79\40\x20\40\151\144\40\40\x20\x64\x65\x73\143\x20\154\151\x6d\151\x74\x20" . $p . "\x20\x2c\x20" . $perPage; goto t7Q2h; rt5jn: $t_catalog_id = $_GPC["\x63\x61\x74\141\x6c\x6f\147\137\151\x64"]; goto DfnZv; B6q64: $resultData["\x67\157\157\x64\x73\x4c\151\x73\164"] = $goodsList; goto UgS02; COf6v: $tableName = tablename("\160\145\x61\x73\x5f\143\x6d\x73\137\147\x6f\157\144\163"); goto lNm6M; zQQq5: global $_W, $_GPC; goto COf6v; DfnZv: if (!(!empty($t_catalog_id) && $t_catalog_id > 0)) { goto thQKl; } goto Fx4uR; ay_wh: $curr = max($_GPC["\160\x61\147\145"], 1); goto ArDcP; ASNVk: if (!empty($_GPC["\x61\143\164\x69\157\156"]) && $_GPC["\x61\143\164\x69\x6f\x6e"] == "\147\145\x74\101\162\x74\151\x63\x6c\x65\114\x69\x73\164\x42\x79\103\141\x74\145\x67\157\x72\x79\x49\x64") { goto wYiay; } goto GRkZo; BgZIt: if (!(!empty($t_catalog_id) && $t_catalog_id > 0)) { goto XbST4; } goto Czpc3; GRkZo: $catalogsList = pdo_getall("\160\x65\x61\x73\x5f\x63\x6d\163\137\143\141\164\141\x6c\x6f\147", array("\x66\x5f\164\171\x70\x65\40\x3d" => 1, "\x66\x5f\x73\x74\x61\164\145\x20\75" => 0, "\x66\x5f\x70\141\162\x65\156\x74\137\151\x64\40\76" => 0), array("\146\137\163\157\x72\x74", "\x66\137\x74\151\x74\154\x65", "\x69\x64")); goto OivL3; ArDcP: $perPage = 6; goto Yu6Jm; Yu6Jm: $pager = pagination($count, $curr, $perPage); goto WrIy2; eYMPR: XbST4: goto pIgc_; OivL3: $resultData["\143\x61\164\x61\154\157\147\114\151\x73\x74"] = $catalogsList; goto z6dUb; Czpc3: $sql .= "\40\x61\156\x64\40\x20\x74\x5f\x63\141\164\x61\154\x6f\x67\137\x69\144\75" . $t_catalog_id; goto eYMPR; VZtND: return $this->result(0, "\xe8\216\267\xe5\x8f\x96\346\225\xb0\346\x8d\xae\346\x88\x90\xe5\x8a\x9f", $resultData); goto Em73g; UgS02: $resultData["\141\164\164\141\x63\x68\165\162\154"] = $_W["\x61\164\164\141\143\150\x75\162\154"]; goto VZtND; QDElp: $sql = "\163\x65\154\145\x63\x74\x20\52\40\x66\x72\x6f\x6d\40" . $tableName . "\x20\167\150\x65\162\145\40\40\x66\x5f\x73\x74\x61\164\x65\75\60"; goto BgZIt; V05KX: Kd1no: goto B6q64; lNm6M: $countSql = "\x73\x65\154\x65\x63\x74\x20\x63\x6f\x75\156\164\x28\52\51\x20\x66\162\157\155\40" . $tableName . "\x20\x77\x68\x65\x72\145\40\x66\137\163\x74\141\x74\x65\x3d\60\x20"; goto rt5jn; TZ5O1: $count = pdo_fetchcolumn($countSql); goto ay_wh; WrIy2: $p = ($curr - 1) * $perPage; goto QDElp; R9S2I: wYiay: goto V05KX; t7Q2h: $goodsList = pdo_fetchall($sql); goto ASNVk; z6dUb: goto Kd1no; goto R9S2I; Fx4uR: $countSql .= "\40\141\156\144\40\40\x74\137\x63\141\164\x61\154\x6f\147\137\x69\144\x3d" . $t_catalog_id; goto K2DWQ; Em73g: ?>