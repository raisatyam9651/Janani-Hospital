<?php
/* ---------------------------------------------------------------------------
   /pages/blogs.php was a byte-for-byte duplicate of /blog/ — same H1, same
   cards, same meta — which split ranking signals between two URLs. Nothing on
   the site links here any more, so it 301s to the canonical blog index and
   passes any historical link equity along.
   --------------------------------------------------------------------------- */
header('Location: /blog/', true, 301);
exit;
