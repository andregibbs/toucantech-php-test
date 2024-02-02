SELECT e.UserRefID, e.emailaddress
FROM emails e
JOIN profiles p ON e.UserRefID = p.UserRefID
WHERE p.Deceased = 0
  AND e.Default = 1
GROUP BY e.UserRefID, e.emailaddress
HAVING COUNT(e.emailaddress) > 1;