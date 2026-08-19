function Update-Mobile-Links($filePath, $isRoot) {
    $text = Get-Content $filePath -Raw
    
    $contactMobileLink = if ($isRoot) { '<a href="pages/contact.html" class="mobile-link" data-nav="contact">' } else { '<a href="../pages/contact.html" class="mobile-link" data-nav="contact">' }
    $blogMobileLink = if ($isRoot) { "<a href=`"blog/index.php`" class=`"mobile-link`" data-nav=`"blog`">`n            <span class=`"mobile-link__icon mobile-link__icon--emerald`"><svg class=`"icon`"><use href=`"#i-activity`"></use></svg></span>`n            <span>Blog</span>`n          </a>" } else { "<a href=`"../blog/index.php`" class=`"mobile-link`" data-nav=`"blog`">`n            <span class=`"mobile-link__icon mobile-link__icon--emerald`"><svg class=`"icon`"><use href=`"#i-activity`"></use></svg></span>`n            <span>Blog</span>`n          </a>" }
    
    if (-not ($text -match '<span class="mobile-link__icon mobile-link__icon--emerald"><svg class="icon"><use href="#i-activity"></use></svg></span>\s*<span>Blog</span>')) {
        $text = $text -replace [regex]::Escape($contactMobileLink), "$blogMobileLink`n          $contactMobileLink"
        Set-Content -Path $filePath -Value $text
    }
}

$rootFiles = Get-ChildItem -Path "c:\Users\GCV\Desktop\janani-hospital\website\*.html"
foreach ($f in $rootFiles) { Update-Mobile-Links $f.FullName $true }

$pagesFiles = Get-ChildItem -Path "c:\Users\GCV\Desktop\janani-hospital\website\pages\*.html"
foreach ($f in $pagesFiles) { Update-Mobile-Links $f.FullName $false }

Update-Mobile-Links "c:\Users\GCV\Desktop\janani-hospital\website\blog\index.php" $false

Write-Output "Updates complete."
