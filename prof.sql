insert into profs(nom, prenom, matiere)values 
("Gibert", "Stéphanie", "informatique"), 
("Hamidou", "Salim", "informatique"),
("Riesner", "Christian", "informatique"),
("Nabli", "Hafedh", "informatique"), 
("Benmidhane", "Moustapha", "informatique"),
("Freard", "Simon", "maths"),
("Laperche", "Paul", "anglais"),
("Denize", "Thomas", "Eco-droit")


INSERT INTO `classe_prof` (`id`, `created_at`, `updated_at`, `nbHeures`, `classe_id`, `prof_id`) VALUES
(1, NULL, NULL, 5, 1, 1),
(2, NULL, NULL, 3, 2, 1),
(3, NULL, NULL, 5, 4, 5),
(4, NULL, NULL, 4, 2, 6),
(5, NULL, NULL, 6, 3, 2),
(6, NULL, NULL, 5, 3, 1),
(7, NULL, NULL, 3, 3, 8),
(8, NULL, NULL, 5, 3, 3),
(9, NULL, NULL, 4, 4, 6),
(10, NULL, NULL, 4, 2, 2),
(11, NULL, NULL, 2, 2, 8);