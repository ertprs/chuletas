 <?php
/**PROPERTY;

 * PARA QU APAREZCA LA OPCION "ABRIR CON SUBLIME TEXT "EN E MEMU CONTEXTUAL DE WINDOWS  
 */
 1- PEGAMOS EL SIGUIENTE CODIGO EN EL CMD EJECTAQNDOLO COMO ADMINISTRADOR

 @echo off
 SET st2Path=C:\Program Files\Sublime Text 3\sublime_text.exe
  
 rem add it for all file types
 @reg add "HKEY_CLASSES_ROOT\*\shell\Abrir con sublime Text 3"         /t REG_SZ /v "" /d "Abrir con sublime Text 3"   /f
 @reg add "HKEY_CLASSES_ROOT\*\shell\Abrir con sublime Text 3"         /t REG_EXPAND_SZ /v "Icon" /d "%st2Path%,0" /f
 @reg add "HKEY_CLASSES_ROOT\*\shell\Abrir con sublime Text 3\command" /t REG_SZ /v "" /d "%st2Path% \"%1\"" /f 

 rem add it for folders
 @reg add "HKEY_CLASSES_ROOT\Folder\shell\Abrir con sublime Text 3" /t REG_SZ /v "" /d "Abrir con sublime Text 3" /f
 @reg add "HKEY_CLASSES_ROOT\Folder\shell\Abrir con sublime Text 3" /t REG_EXPAND_SZ /v "Icon" /d "%st2Path%,0" /f
 @reg add "HKEY_CLASSES_ROOT\Folder\shell\Abrir con sublime Text 3\command" /t REG_SZ /v "" /d "%st2Path% \"%1\"" /f
 pause

 2 -EN CASO DE ERROR EN EL CAMPO DE BÚSQUEDA DE WINDOWS ESCRIBIR REGEDIT MY SEGUIR LA SIGUIENTE RUTA

 HKEY_CLASSES_ROOT/folder/shell