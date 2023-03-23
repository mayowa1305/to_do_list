CREATE TABLE `todo_list` (
  `id` bigserial NOT NULL,
  `task` [pk],
  `date_added` varchar(255) NOT NULL DEFAULT (now()),
  `due_date` varchar(255) NOT NULL
);
