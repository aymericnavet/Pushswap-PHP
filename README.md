# Pushswap-PHP

Le projet à pour but de trier deux listes de nombres nommées "la" et "lb" par ordre croissant. Nous devions afficher la série d'opérations qui permettent de trier la liste.

Pour y arriver on a eu accés qu'a certaines opérations : 

• sa : échange les positions des deux premiers éléments de la (rien ne se produit s’il n’y a pas assez
d’éléments).
• sb : échange les positions des deux premiers éléments de lb (rien ne se produit s’il n’y a pas assez
d’éléments).
• sc : sa et sb en même temps.
• pa : prend le premier élément de lb et le place à la première position de la (rien ne se produit si
lb
est vide).
• pb : prend le premier élément de la et le place à la première position de lb (rien ne se produit si
1
la
est vide).
• ra : fait une rotation de la vers le début. (le premier élément devient le dernier)
• rb : fait une rotation de lb vers le début (le premier élément devient le dernier).
• rr : ra et rb en même temps.
• rra : fait une rotation de la vers la fin. (le dernier élément devient le premier).
• rrb : fait une rotation de lb vers la fin. (le dernier élément devient le premier).
• rrr : rra et rrb en même temps

Nous pouvions implémenter des bonus dans un dossier, personnelement j'ai choisis comme bonus de faire une interface graphique avec des couleurs, des barres pour bien delimiter la liste "la" de la liste "lb".
