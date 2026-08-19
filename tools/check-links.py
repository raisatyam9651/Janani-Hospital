"""Verifies every local href/src/url() in the generated site resolves to a file."""
import glob
import os
import re
import sys
import urllib.parse

missing = {}
for path in sorted(glob.glob('website/**/*.html', recursive=True)):
    base = os.path.dirname(path)
    html = open(path, encoding='utf-8').read()
    urls = re.findall(r'(?:src|href)="([^"]+)"', html)
    urls += re.findall(r"url\('([^']+)'\)", html)
    for u in urls:
        if u.startswith(('http', '#', 'tel:', 'mailto:', 'data:', 'javascript:')):
            continue
        clean = urllib.parse.unquote(u.replace('&amp;', '&')).split('#')[0].split('?')[0]
        target = os.path.normpath(os.path.join(base, clean))
        if not os.path.exists(target):
            missing.setdefault(target.replace('\\', '/'), set()).add(os.path.basename(path))

if not missing:
    print('OK - every local reference resolves')
else:
    print(f'{len(missing)} unresolved reference(s):')
    for target, pages in sorted(missing.items()):
        pl = sorted(pages)
        shown = ', '.join(pl[:4]) + (f' (+{len(pl) - 4})' if len(pl) > 4 else '')
        print(f'  {target}   <- {shown}')
sys.exit(1 if missing else 0)
