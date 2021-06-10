select *
from country A

where A.cioc in ('tur', 'ita', 'wal', 'SUI')
order by field(A.cioc, 'tur', 'ita', 'wal', 'SUI');

insert into tournament_group_table(tournamentId, tournamentGroupId, countryId, title)
select 1, 1, A.countryId, 'A'
from country A

where A.cioc in ('tur', 'ita', 'wal', 'SUI')
order by field(A.cioc, 'tur', 'ita', 'wal', 'SUI');

insert into tournament_group_table(tournamentId, tournamentGroupId, countryId, title)
select 1, 2, A.countryId, 'B'
from country A

where A.cioc in ('den', 'fin', 'bel', 'rus')
order by field(A.cioc, 'den', 'fin', 'bel', 'rus');