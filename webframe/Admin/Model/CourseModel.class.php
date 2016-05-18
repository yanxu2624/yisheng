<?php
namespace Admin\Model;
use Think\Model;

class CourseModel extends Model{
	protected $tableName="course";

	/*
	数据入库的方法
	*/
	public function dataAdd($data=null){
		if(is_null($data)){
			$return=array(
				"status"=>false,
				"msg"=>"请给出有效数据"
				);
			return $return;
		}
		else{
			if(M("course")->data($data)->add()){
				$return=array(
					"status"=>true,
					"msg"=>"数据添加成功"
				);
			}
			else{
				$return=array(
					"status"=>false,
					"msg"=>"数据添加失败"
				);
			}
		}
		return $return;
	}

	/*
	修改操作
	*/
	public function dataEdit($id=null,$data=null){
		if(is_null($id)||is_null($data)){
			$return=array(
				"status"=>false,
				"msg"=>"请给出有效数据"
				);
			return $return;
		}
		else{
			if(M("course")->where("course_id={$id}")->save($data)){
				$return=array(
					"status"=>true,
					'msg'=>"修改成功"
					);
			}
			else{
				$return=array(
					"status"=>false,
					"msg"=>"修改失败"
					);
			}
		}
		return $return;
	}

	/*
	数据删除
	*/
	public function dataDel($id=null){
		if(is_null($id)){
			$return=array(
				"status"=>false,
				"msg"=>"请给出有效数据"
				);
			return $return;
		}
		else{
			if(M('course')->delete($id)){
				$return=array(
					"status"=>true,
					"msg"=>"数据删除成功"
					);
			}
			else{
				$return=array(
					"status"=>false,
					"msg"=>"数据删除失败"
					);
			}
		}
		return $return;
	}

	/*
	开放选课操作
	*/
	public function openSelect($course_semester=null,$data=null){
		if(is_null($course_semester)||is_null($data)){
			$return=array(
				"status"=>false,
				"msg"=>"请给出有效数据"
				);
			return $return;
		}
		else{
			if(M("course")->where("course_semester={$course_semester} and course_rel_status=1")->save($data)){
				$return=array(
					"status"=>true,
					"msg"=>"修改成功"
					);
			}
			else{
				$return=array(
					"status"=>false,
					"msg"=>"修改失败"
					);
			}
		}
		return $return;
	}


}