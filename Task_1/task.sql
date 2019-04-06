select group_concat(u.name),
       count(pn.phone)
from users u
         left join phone_numbers pn on pn.user_id = u.id
where u.gender = 2
  and pn.phone is not null
  and timestampdiff(YEAR, from_unixtime(u.birth_date), now()) between 18 and 22
group by u.gender;