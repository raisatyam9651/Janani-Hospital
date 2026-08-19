// index.html is hand-authored, but its navbar/footer/sprite must stay identical
// to every generated page. This swaps those three blocks in from lib/chrome.mjs.
import fs from 'node:fs';
import { navbar, footer, sprite, CHROME_ICONS } from './lib/chrome.mjs';

const FILE = 'website/index.html';
let html = fs.readFileSync(FILE, 'utf8');

// Icons the home page needs beyond the shared chrome.
const HOME_ICONS = [
  'alert-triangle', 'arrow-right', 'award', 'check-circle', 'chevron-left',
  'chevron-right', 'globe', 'home', 'map-pin', 'message-square', 'search',
  'send', 'shield', 'star', 'target',
];

function swap(open, close, replacement, label) {
  const start = html.indexOf(open);
  if (start === -1) throw new Error(`${label}: opening marker not found`);
  const end = html.indexOf(close, start);
  if (end === -1) throw new Error(`${label}: closing marker not found`);
  html = html.slice(0, start) + replacement + html.slice(end + close.length);
}

swap('<svg xmlns="http://www.w3.org/2000/svg" style="position:absolute',
     '</svg>\n', sprite([...CHROME_ICONS, ...HOME_ICONS]).trimStart() + '\n', 'sprite');

swap('<nav class="site-nav"', '</nav>', navbar('').replace(/^<nav/, '<nav'), 'navbar');
swap('<footer class="site-footer"', '</footer>', footer(''), 'footer');

fs.writeFileSync(FILE, html);
console.log('index.html chrome synced');
