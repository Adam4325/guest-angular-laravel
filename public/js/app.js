var app = angular.module('app',[],function($interpolateProvider){
	$interpolateProvider.startSymbol('<%');
	$interpolateProvider.endSymbol('%>');
});

app.controller("GuestController",function($scope,$http){
	$scope.dataGuest=[];
	$idGlobal="";
	$scope.obj=[];
	$scope.nama="";
	$scope.email="";
	$scope.pesan="";
	// Get Data From Service Laravel
	$scope.allGuest = function(){
		$http.get('/guest').
		success(function(data,status,header,config){
			$scope.dataGuest = data;
			//console.log(data);
		});
	}

	//EVENT CLICK
	$scope.edit = function(id){
		$http.get('guest/'+id).
		success(function(data,status,header,config){
			$idGlobal = data.id;
			$scope.nama = data.nama;
			$scope.email = data.email;
			$scope.pesan = data.pesan;
			$scope.obj=data;
			console.log(" Objek :"+ data);
			console.log(id);
			id="";
		});
	}

	$scope.editTodo = function(){
		$http.post('guest/edit/'+$idGlobal,{nama:$scope.nama,email:$scope.email,pesan:$scope.pesan}).
		success(function(data,status,header,config){
			$scope.allGuest();
			// jQuery(".modal-backdrop").fadeOut();
			// jQuery("#myModal").hide();
			console.log(data+" | "+ $scope.nama);
		}).
		error(function(data,status,header,config){
			console.log(status);
		});
	}

	$scope.search = function (_) {
		$scope.dataGuest = _.filter($scope.allItems,
		function (item) {
			return searchUtil(item, $scope.searchText);
		});
		if ($scope.searchText == '') {
			 $scope.dataGuest = $scope.allItems;
		}
	}
	// END EVENT CLICKa
	function searchUtil(item, toSearch) {
		return (item.name.toLowerCase().indexOf(toSearch.toLowerCase()) > -1 || item.Email.toLowerCase().indexOf(toSearch.toLowerCase()) > -1 || item.EmpId == toSearch) ? true : false;
	}
	$scope.allitems = $scope.allGuest();
});
