$blogDir = "c:\Users\GCV\Desktop\janani-hospital\website\blog"
if (-not (Test-Path $blogDir)) {
    New-Item -ItemType Directory -Force -Path $blogDir | Out-Null
}

$blogsHtml = "c:\Users\GCV\Desktop\janani-hospital\website\pages\blogs.html"
$content = Get-Content $blogsHtml -Raw

# Duplicate articles to make it 9
$articleRegex = [regex]'(?s)<article class="blog-card".*?</article>'
$articles = $articleRegex.Matches($content)

if ($articles.Count -ge 3) {
    $first3 = $articles[0].Value + "`n" + $articles[1].Value + "`n" + $articles[2].Value
    $newArticles = $first3 + "`n" + $first3 + "`n" + $first3
    
    $startIdx = $articles[0].Index
    $endIdx = $articles[2].Index + $articles[2].Length
    
    $before = $content.Substring(0, $startIdx)
    $after = $content.Substring($endIdx)
    
    $content = $before + $newArticles + $after
}

$content = $content -replace 'data-page="blogs"', 'data-page="blog"'
Set-Content -Path "$blogDir\index.php" -Value $content
Write-Output "Created blog/index.php"

# Now update headers and footers in all files
function Update-Links($filePath, $isRoot) {
    $text = Get-Content $filePath -Raw
    
    $blogHeaderLink = if ($isRoot) { '<a href="blog/index.php" class="nav-link" data-nav="blog">Blog</a>' } else { '<a href="../blog/index.php" class="nav-link" data-nav="blog">Blog</a>' }
    $contactHeaderLink = if ($isRoot) { '<a href="pages/contact.html" class="nav-link" data-nav="contact">Contact</a>' } else { '<a href="../pages/contact.html" class="nav-link" data-nav="contact">Contact</a>' }
    
    # Header update
    if (-not ($text -match [regex]::Escape($blogHeaderLink))) {
        $text = $text -replace [regex]::Escape($contactHeaderLink), "$blogHeaderLink`n        $contactHeaderLink"
    }
    
    # Mobile menu update
    $contactMobileLink = if ($isRoot) { '<a href="pages/contact.html" class="mobile-link" data-nav="contact">' } else { '<a href="../pages/contact.html" class="mobile-link" data-nav="contact">' }
    $blogMobileLink = if ($isRoot) { "<a href=`"blog/index.php`" class=`"mobile-link`" data-nav=`"blog`">`n            <span class=`"mobile-link__icon mobile-link__icon--emerald`"><svg class=`"icon`"><use href=`"#i-activity`"></use></svg></span>`n            <span>Blog</span>`n          </a>" } else { "<a href=`"../blog/index.php`" class=`"mobile-link`" data-nav=`"blog`">`n            <span class=`"mobile-link__icon mobile-link__icon--emerald`"><svg class=`"icon`"><use href=`"#i-activity`"></use></svg></span>`n            <span>Blog</span>`n          </a>" }
    
    if (-not ($text -match 'data-nav="blog"')) {
        $text = $text -replace [regex]::Escape($contactMobileLink), "$blogMobileLink`n          $contactMobileLink"
    }
    
    # Footer update
    $surgeryFooterLink = if ($isRoot) { '<li><a href="pages/department-surgery.html" class="footer-link"><svg class="icon"><use href="#i-arrow-right"></use></svg><span>Surgery</span></a></li>' } else { '<li><a href="../pages/department-surgery.html" class="footer-link"><svg class="icon"><use href="#i-arrow-right"></use></svg><span>Surgery</span></a></li>' }
    $blogFooterLink = if ($isRoot) { '<li><a href="blog/index.php" class="footer-link"><svg class="icon"><use href="#i-arrow-right"></use></svg><span>Blog</span></a></li>' } else { '<li><a href="../blog/index.php" class="footer-link"><svg class="icon"><use href="#i-arrow-right"></use></svg><span>Blog</span></a></li>' }
    
    if (-not ($text -match [regex]::Escape($blogFooterLink))) {
        $text = $text -replace [regex]::Escape($surgeryFooterLink), "$surgeryFooterLink`n            $blogFooterLink"
    }

    Set-Content -Path $filePath -Value $text
}

# Process root files
$rootFiles = Get-ChildItem -Path "c:\Users\GCV\Desktop\janani-hospital\website\*.html"
foreach ($f in $rootFiles) { Update-Links $f.FullName $true }

# Process pages files
$pagesFiles = Get-ChildItem -Path "c:\Users\GCV\Desktop\janani-hospital\website\pages\*.html"
foreach ($f in $pagesFiles) { Update-Links $f.FullName $false }

# Process blog file
Update-Links "c:\Users\GCV\Desktop\janani-hospital\website\blog\index.php" $false

Write-Output "Updates complete."
