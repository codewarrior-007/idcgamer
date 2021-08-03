rmdir /Q /S "..\public\css\"
rmdir /Q /S "..\public\js\"
rmdir /Q /S "..\public\img\"
del /F "..\resources\views\webapp.blade.php"

xcopy ".\dist\*.*" "..\public\" /E /K /D /H /Y
copy ".\dist\index.html" "..\resources\views\webapp.blade.php"
