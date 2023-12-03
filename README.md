# -project
인프 협업

list.php : 게시판

로그인 돼있을시 $_SESSION['nickname']의 값은 로그인 된 유저의 닉네임

로그아웃 돼있을시 $_SESSION['nickname']은 할당되지 않음 (unset된 상태)

참조한 데이터베이스의 이름은 config.php에 저장되어있음

추가) 게시글을 올릴 때 name 입력란은 빼고 대신 board의 name 변수에 $_SESSION['nickname']을 할당함

list의 글쓴이 목록에 board의 name 변수를 가져와 씀

gid, passwd 삭제함
