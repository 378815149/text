<?php
 goto tzs6U; L242N: $sql = "\x73\x65\154\x65\x63\164\x20\52\40\146\162\x6f\x6d\40" . $tableName . "\40\40\x77\150\x65\x72\145\40\x31\x3d\61\x20\x20" . $andSql; goto ZoDww; mdEcM: QK8Re: goto ZL8hg; mX1e5: $andSql = "\x20\x61\x6e\x64\40\146\x5f\164\151\164\x6c\x65\x20\154\x69\153\145\40\x27\45" . $keyword . "\45\47\x20\x20"; goto mdEcM; HRjeO: $keyword = $_GPC["\153\x65\x79\167\157\x72\x64"]; goto Tf8Pl; EosSe: $p = ($curr - 1) * $perPage; goto L242N; PJu6h: $catalogs = pdo_getall("\160\145\x61\163\137\143\155\163\x5f\143\x61\164\x61\154\157\147", array("\146\x5f\x74\171\x70\x65\40\75" => 1), array("\146\x5f\x74\x69\164\x6c\x65", "\151\x64")); goto hEJTV; tzs6U: ?>
 <?php  goto JFBQN; f1ZYn: $pager = pagination($count, $curr, $perPage); goto EosSe; Ntstv: $count = pdo_fetchcolumn("\163\x65\154\145\143\164\x20\143\157\x75\156\x74\x28\52\51\40\x66\x72\x6f\x6d\40" . $tableName . "\40\40\x77\150\x65\x72\145\x20\61\75\61\x20\x20" . $andSql); goto lEX6N; uHfGJ: if (!($keyword != null)) { goto QK8Re; } goto mX1e5; ZL8hg: $tableName = tablename("\160\145\141\163\137\143\x6d\x73\137\x67\x6f\x6f\x64\x73"); goto Ntstv; JFBQN: global $_W, $_GPC; goto HRjeO; Tf8Pl: $andSql = ''; goto uHfGJ; djAdu: $list = pdo_fetchall($sql); goto PJu6h; OycKj: $perPage = 10; goto f1ZYn; ZoDww: $sql .= "\40\x6f\162\x64\x65\x72\x20\x62\171\x20\151\x64\x20\144\x65\163\x63\40\154\151\x6d\x69\x74\x20" . $p . "\x20\x2c\x20" . $perPage; goto djAdu; lEX6N: $curr = max($_GPC["\x70\x61\147\145"], 1); goto OycKj; hEJTV: include $this->template("\147\157\x6f\x64\x73");