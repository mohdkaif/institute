<style>
.dbox{position: relative;
    display: inline-block;
    width: 84px;
    height: 84px;
    text-align: center;
    float: left;
}
</style>
<div class="row pie-charts">
  <div class="pie-chart-item-container" ng-repeat="chart in charts">
    <div ba-panel>
      <div class="pie-chart-item">
        <div  class="dbox"> <i class="fa {{ ::chart.icon }} fa-4x"></i></div>
        <div class="description">
          <div>{{ ::chart.description }}</div>
          <div class="description-stats">{{ ::chart.stats }}</div>
        </div>
      </div>
    </div>
  </div>
</div>

	