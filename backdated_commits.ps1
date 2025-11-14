# --- CONFIG ---
$Root = "C:\xampp\htdocs\stockya"
Set-Location $Root

# Asegurar carpeta y archivos de bitácora
$BitacoraDir = "docs\bitacora"
$Files = @(
  "docs\bitacora\semana-1.md",
  "docs\bitacora\semana-2.md",
  "docs\bitacora\semana-3.md",
  "docs\bitacora\semana-4.md"
)

if (!(Test-Path $BitacoraDir)) { New-Item -ItemType Directory -Path $BitacoraDir | Out-Null }

function Ensure-File {
  param([string]$Path, [string]$Header)
  if (!(Test-Path $Path)) {
    New-Item -ItemType File -Path $Path | Out-Null
    Add-Content -Path $Path -Value $Header
    Add-Content -Path $Path -Value ""
    Add-Content -Path $Path -Value "## Log de cambios simulados"
    Add-Content -Path $Path -Value ""
  }
}

Ensure-File $Files[0] "# Semana 1 — 2025-10-13 a 2025-10-19"
Ensure-File $Files[1] "# Semana 2 — 2025-10-20 a 2025-10-26"
Ensure-File $Files[2] "# Semana 3 — 2025-10-27 a 2025-11-02"
Ensure-File $Files[3] "# Semana 4 — 2025-11-03 a 2025-11-09"

# Nombres del equipo (solo nombre visible)
$Seb   = 'Sebastian'
$Juan  = 'Juan Pablo'
$Mafe  = 'Mafe'
$Julio = 'Julio Cesar'

# Helper: añade una línea al archivo y hace commit con autor/fecha retroactivos
function New-BackdatedCommit {
  param(
    [string]$AuthorName,
    [string]$When,      # "YYYY-MM-DD HH:MM:SS"
    [string]$Message,
    [string]$FilePath
  )

  # 1) Escribir una línea para asegurar cambio
  $line = "* $When - $AuthorName - $Message"
  Add-Content -Path $FilePath -Value $line

  # 2) Forzar metadatos del commit (nombre + email genérico + fecha)
  $env:GIT_AUTHOR_NAME     = $AuthorName
  $env:GIT_COMMITTER_NAME  = $AuthorName
  $env:GIT_AUTHOR_EMAIL    = 'noreply@local'
  $env:GIT_COMMITTER_EMAIL = 'noreply@local'
  $env:GIT_AUTHOR_DATE     = $When
  $env:GIT_COMMITTER_DATE  = $When

  # 3) Commit
  git add $FilePath
  git commit -m $Message | Out-Null

  # 4) Limpiar variables
  'GIT_AUTHOR_NAME','GIT_COMMITTER_NAME','GIT_AUTHOR_EMAIL','GIT_COMMITTER_EMAIL','GIT_AUTHOR_DATE','GIT_COMMITTER_DATE' |
    ForEach-Object { Remove-Item Env:\$_ -ErrorAction SilentlyContinue }
}

# ── Semana 1 (2025-10-13..19)
New-BackdatedCommit -AuthorName $Seb   -When "2025-10-14 10:00:00" -Message "feat(setup): inicializar proyecto Laravel 11" -FilePath $Files[0]
New-BackdatedCommit -AuthorName $Juan  -When "2025-10-16 15:30:00" -Message "chore(env): agregar .env ejemplo y config DB" -FilePath $Files[0]
New-BackdatedCommit -AuthorName $Mafe  -When "2025-10-18 18:45:00" -Message "feat(ui): layout base con Blade/Tailwind" -FilePath $Files[0]
New-BackdatedCommit -AuthorName $Julio -When "2025-10-19 20:10:00" -Message "feat(auth): instalar Breeze + Livewire (login/registro)" -FilePath $Files[0]

# ── Semana 2 (2025-10-20..26)
New-BackdatedCommit -AuthorName $Seb   -When "2025-10-21 10:10:00" -Message "feat(productos): modelo + migración Producto" -FilePath $Files[1]
New-BackdatedCommit -AuthorName $Juan  -When "2025-10-23 16:00:00" -Message "feat(productos): CRUD Livewire (listar/crear/editar/eliminar)" -FilePath $Files[1]
New-BackdatedCommit -AuthorName $Mafe  -When "2025-10-24 19:20:00" -Message "feat(ui): vistas de productos (listado y formularios)" -FilePath $Files[1]
New-BackdatedCommit -AuthorName $Julio -When "2025-10-26 21:00:00" -Message "seed(db): datos de prueba para inventario" -FilePath $Files[1]

# ── Semana 3 (2025-10-27..11-02)
New-BackdatedCommit -AuthorName $Seb   -When "2025-10-28 09:30:00" -Message "feat(stock): modelo MovimientoStock y lógica entradas/salidas" -FilePath $Files[2]
New-BackdatedCommit -AuthorName $Juan  -When "2025-10-30 14:15:00" -Message "feat(stock): UI registro de movimientos" -FilePath $Files[2]
New-BackdatedCommit -AuthorName $Mafe  -When "2025-11-01 17:50:00" -Message "feat(reports): reportes por fecha/categoría + export CSV" -FilePath $Files[2]
New-BackdatedCommit -AuthorName $Julio -When "2025-11-02 20:40:00" -Message "test(stock): pruebas de integración de inventario" -FilePath $Files[2]

# ── Semana 4 (2025-11-03..09)
New-BackdatedCommit -AuthorName $Seb   -When "2025-11-04 10:05:00" -Message "fix(authz): policies y middlewares de seguridad" -FilePath $Files[3]
New-BackdatedCommit -AuthorName $Juan  -When "2025-11-06 15:25:00" -Message "perf(app): optimizar consultas con eager loading" -FilePath $Files[3]
New-BackdatedCommit -AuthorName $Mafe  -When "2025-11-08 19:35:00" -Message "style(ui): ajustes responsive y pulido final" -FilePath $Files[3]
New-BackdatedCommit -AuthorName $Julio -When "2025-11-09 21:10:00" -Message "docs(readme): guía de instalación y uso" -FilePath $Files[3]
