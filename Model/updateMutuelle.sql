use mutuelle;

alter table epargne
drop foreign key fk_epargne_enseignant;

alter table epargne
add constraint fk_user_id foreign key (enseignant_idenseignant) references user(id);

alter table fondsocial
drop foreign key fk_fondsocial_enseignant1;

alter table fondsocial
add constraint fk_user_id_fs foreign key (enseignant_idenseignant) references user(id);

alter table emprunt
drop foreign key fk_emprunt_enseignant1;

alter table emprunt
add constraint fk_user_id_emp foreign key (enseignant_idenseignant) references user(id);

alter table remboursement
drop foreign key fk_remboursement_enseignant1;

alter table remboursement
add constraint fk_user_id_rem foreign key (enseignant_idenseignant) references user(id); 

drop table remboursement;