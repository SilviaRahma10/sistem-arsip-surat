#
# TABLE STRUCTURE FOR: disposisi
#

DROP TABLE IF EXISTS `disposisi`;

CREATE TABLE `disposisi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sm_id` int(11) NOT NULL,
  `jabatan_id` int(11) DEFAULT NULL,
  `isi` text NOT NULL,
  `batas_waktu` date NOT NULL,
  `sifat_id` int(11) DEFAULT NULL,
  `catatan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sifat_id` (`sifat_id`),
  KEY `jabatan_id` (`jabatan_id`),
  KEY `disposisi_ibfk_1` (`sm_id`),
  CONSTRAINT `disposisi_ibfk_1` FOREIGN KEY (`sm_id`) REFERENCES `surat_masuk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `disposisi_ibfk_2` FOREIGN KEY (`sifat_id`) REFERENCES `sifat` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `disposisi_ibfk_3` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatan` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: jabatan
#

DROP TABLE IF EXISTS `jabatan`;

CREATE TABLE `jabatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(128) DEFAULT NULL COMMENT 'opsional',
  `jabatan` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: sifat
#

DROP TABLE IF EXISTS `sifat`;

CREATE TABLE `sifat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sifat` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO `sifat` (`id`, `sifat`) VALUES (1, 'Segera');
INSERT INTO `sifat` (`id`, `sifat`) VALUES (2, 'Sangat Segera');
INSERT INTO `sifat` (`id`, `sifat`) VALUES (3, 'Rahasia');


#
# TABLE STRUCTURE FOR: surat_keluar
#

DROP TABLE IF EXISTS `surat_keluar`;

CREATE TABLE `surat_keluar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_agenda` int(11) NOT NULL,
  `pengirim` varchar(128) NOT NULL,
  `no_surat` varchar(128) NOT NULL,
  `isi` text NOT NULL,
  `tgl_surat` date NOT NULL,
  `tgl_diterima` date NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `file` varchar(128) DEFAULT NULL,
  `created_at` date NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

INSERT INTO `surat_keluar` (`id`, `no_agenda`, `pengirim`, `no_surat`, `isi`, `tgl_surat`, `tgl_diterima`, `keterangan`, `file`, `created_at`, `user_id`) VALUES (10, 1, 'A', '2', 'aa', '2020-12-01', '2020-12-02', 'A', 'Oarkom.jpg', '2020-12-01', 1);


#
# TABLE STRUCTURE FOR: surat_masuk
#

DROP TABLE IF EXISTS `surat_masuk`;

CREATE TABLE `surat_masuk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_agenda` int(11) DEFAULT NULL,
  `pengirim` varchar(128) DEFAULT NULL,
  `no_surat` varchar(128) DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `tgl_surat` date DEFAULT NULL,
  `tgl_diterima` date DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `file` varchar(128) DEFAULT NULL,
  `created_at` date NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

INSERT INTO `surat_masuk` (`id`, `no_agenda`, `pengirim`, `no_surat`, `isi`, `tgl_surat`, `tgl_diterima`, `keterangan`, `file`, `created_at`, `user_id`) VALUES (15, 1, 'A', '2', 'EF', '2020-11-11', '2020-11-25', 'A', 'default1.png', '2020-11-30', 1);


#
# TABLE STRUCTURE FOR: user
#
DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL,
  `date_created` varchar(128) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

INSERT INTO `user` (`id`, `name`, `username`, `email`, `password`, `image`, `role_id`, `date_created`) VALUES (7, 'dda', 'admin1', 'dfajri856@gmail.com', '$2y$10$EeG/zY6jnheP9thro83VVubJ5FOtgoqSDQtuS2mmxAUJ1KnW0SE9u', 'default.svg', 2, '1605240939');
INSERT INTO `user` (`id`, `name`, `username`, `email`, `password`, `image`, `role_id`, `date_created`) VALUES (11, 'sd', 'sd123', 'sd123@gmail.com', '$2y$10$OWzIrDViDfn9gC2aPXVVuOYZ26.KpnnZJf7MnPTRh1NcKVtCxufYW', 'default.svg', 2, '1605249406');
INSERT INTO `user` (`id`, `name`, `username`, `email`, `password`, `image`, `role_id`, `date_created`) VALUES (15, 'daffaalfajri', 'daffaalfajri123', 'ddaffal123@gmail.com', '$2y$10$8AGCjisjdPcXemXQxxviDu6vu6.a/BGZikm.Pr6Rnr6gLql60YLzG', 'default.svg', 1, '1605284625');
INSERT INTO `user` (`id`, `name`, `username`, `email`, `password`, `image`, `role_id`, `date_created`) VALUES (16, 'daffaalfajri', 'adimn12345', 'daffaalfajri1234@gmail.com', '$2y$10$gGSjCjmz4/Pw70ERt3f17O9UeU1I5b/xolRgtlhcG/8JxGQABRj6i', 'default.svg', 1, '1605493277');
INSERT INTO `user` (`id`, `name`, `username`, `email`, `password`, `image`, `role_id`, `date_created`) VALUES (17, 'ssda', 'asdad112', 'asdad112@gmail.com', '$2y$10$7DEnjl.OcjYeNZcpyiV6ye6uwy1MLqtPvuxhVwTpxRtl95zjYZ2x2', 'default.svg', 2, '1605493420');
INSERT INTO `user` (`id`, `name`, `username`, `email`, `password`, `image`, `role_id`, `date_created`) VALUES (18, 'firstieliora', 'firstiadmin1', 'firsti@gmail.com', '$2y$10$Xrdlg7.yqfJFFtfCrZkhgeIzczE357v1JRg7wVK7h3nCLb5O0dWSq', 'default1.png', 1, '1605493492');
INSERT INTO `user` (`id`, `name`, `username`, `email`, `password`, `image`, `role_id`, `date_created`) VALUES (19, 'ahmadfaris', 'ahmadfaris1', 'ahmadfaris@gmail.com', '$2y$10$c2nlugicNzipxNWULbW49.zJsZJ6hIFAjzNYShcD2txGVR/QSSXDK', 'default.svg', 1, '1605494562');
INSERT INTO `user` (`id`, `name`, `username`, `email`, `password`, `image`, `role_id`, `date_created`) VALUES (20, 'ahmad faris', 'ahmadfaris12', 'mikaeldemon@gmail.com', '$2y$10$aKraZyJLdRdj7kfaBy3nQ.Bt9IKpmbx.oXlqSNGsm/qEl9nXC0KBS', 'default.svg', 1, '1605494630');
INSERT INTO `user` (`id`, `name`, `username`, `email`, `password`, `image`, `role_id`, `date_created`) VALUES (21, 'adha dont', 'adha123', 'adha12@gmail.com', '$2y$10$R1lMYYHWKPkxLoihEf1Y0.ddm.ip/0Gno86YbAuYgkXcZ1Xr0Y/7O', 'default.svg', 2, '1605494685');


#
# TABLE STRUCTURE FOR: user_role
#

DROP TABLE IF EXISTS `user_role`;

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO `user_role` (`id`, `role`) VALUES (1, 'Admin');
INSERT INTO `user_role` (`id`, `role`) VALUES (2, 'User');


#
# TABLE STRUCTURE FOR: user_token
#

DROP TABLE IF EXISTS `user_token`;

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES (1, 'silviarahma2021@gmail.com', '7mrmfi2wevTUH00kHb3Q6rLly4OhbiweRaKiIEl9Lz0=', '1605240598');
INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES (2, 'widyanurulhuda@gmail.com', 'PRB8EGsnedbZW9f8RBheB5i9GKwY36XX7hb6SlIIrMU=', '1605249558');


