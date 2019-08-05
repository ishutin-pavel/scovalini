set nocompatible              " be iMproved, required
filetype off                  " required

" set the runtime path to include Vundle and initialize
set rtp+=~/.vim/bundle/Vundle.vim
call vundle#begin()
" alternatively, pass a path where Vundle should install plugins
"call vundle#begin('~/some/path/here')

" let Vundle manage Vundle, required
Plugin 'VundleVim/Vundle.vim'

"Оборачивает код
Plugin 'tpope/vim-surround'
"Команда точка для vim-surround
Plugin 'tpope/vim-repeat'

"Рекурсивный поиск по файлам
Plugin 'kien/ctrlp.vim'

"Подсветка парных тегов
Plugin 'gregsexton/MatchTag'

"Комментарии
Plugin 'tpope/vim-commentary'

"Мультикурсор
Plugin 'terryma/vim-multiple-cursors'

"Emmet
Plugin 'mattn/emmet-vim'

" The sparkup vim script is in a subdirectory of this repo called vim.
" Pass the path to set the runtimepath properly.
Plugin 'rstacruz/sparkup', {'rtp': 'vim/'}
" Install L9 and avoid a Naming conflict if you've already installed a
" different version somewhere else.
" Plugin 'ascenator/L9', {'name': 'newL9'}

" All of your Plugins must be added before the following line
call vundle#end()            " required
filetype plugin indent on    " required
" To ignore plugin indent changes, instead use:
"filetype plugin on
"
" Brief help
" :PluginList       - lists configured plugins
" :PluginInstall    - installs plugins; append `!` to update or just :PluginUpdate
" :PluginSearch foo - searches for foo; append `!` to refresh local cache
" :PluginClean      - confirms removal of unused plugins; append `!` to auto-approve removal
"
" see :h vundle for more details or wiki for FAQ
" Put your non-Plugin stuff after this line

"Кодировка
set fileencoding=utf-8
set encoding=utf-8
set termencoding=utf-8

"
filetype plugin on

"Длина таба в пробелах
set shiftwidth=2
set tabstop=2
"Таб меняет на пробелы
set expandtab

"Отображаем номера строк
set number

"Подсветка синтаксиса
syntax enable

"Подсветка текущей строки
set cursorline

"Подсветка результатов поиска
set hlsearch

"Цветовую схему. Устанавливается отдельно
colorscheme monokai

"Показать незавершенные команды
set showcmd

"Разрешить переключаться по файлам без сохранения
set hidden

set mouse=a

"Переход по окнам ctrl + hjkl
map <C-k> <C-w><Up>
map <C-j> <C-w><Down>
map <C-l> <C-w><Right>
map <C-h> <C-w><Left>

"Показать/скрыть панель файлов в NERDTree
nmap <silent> <leader><leader> :NERDTreeToggle<CR>

"Отключить подсказку файлогого менеджера
let g:netrw_banner = 0

"Курсор в виде блока
let &t_ti.="\e[1 q"
let &t_SI.="\e[5 q"
let &t_EI.="\e[1 q"
let &t_te.="\e[0 q"
