<?php
class MySessionHandler implements SessionHandlerInterface
{
	private $SESS_DB = null;
	public function open($aSavaPath, $aSessionName)
	{
		//file_put_contents(R.'/log/log.txt','[tip]SESSION开启'."\n".file_get_contents(R.'/log/log.txt'));
		$this -> SESS_DB = db('sessions');
		return true;
	}
	public function close()
	{
		return true;
	}
	public function read( $id )
	{

		//file_put_contents(R.'/log/log.txt','[tip]SESSION读取'."\n".file_get_contents(R.'/log/log.txt'));
		$res = $this -> SESS_DB -> where(array('sessionid'=>$id))->find();
		if($res)
		{	
			return $res['datavalue'];
		} else{
			//$this -> SESS_DB -> insert(array('sessionid'=>$id,'lastupdated'=>time(),'datavalue'=>''));
			return false;
		}
	}
	public function write( $id, $data )
	{
		//file_put_contents(R.'/log/log.txt','[error]SESSION保存写入'.$id.':'.$data."\n".@file_get_contents(R.'/log/log.txt'));
		//$data = addslashes( $data );
		$qid = $this->SESS_DB -> insert(array('sessionid'=>$id,'lastupdated'=>time(),'datavalue'=>$data));
		if (!$qid) {
			//file_put_contents(R.'/log/log.txt','[error]SESSION写入失败'."\n".file_get_contents(R.'/log/log.txt'));
			$qid = $this->SESS_DB -> where(array('sessionid'=>$id))->update(array('datavalue'=>$data,'lastupdated'=>time()));
		}
		return $qid;
	}
	public function destroy( $id )
	{
		$this -> SESS_DB -> where(array('sessionid'=>$id)) -> delete();
		return true;
	}
	public function gc( $aMaxLifeTime )
	{
		$time = time() - $aMaxLifeTime;
		$this -> SESS_DB -> where("WHERE lastupdated < ".$time) -> delete();
		return true;
	}
}