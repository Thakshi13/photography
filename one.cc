#include "ns3/core-module.h"
#include "ns3/network-module.h"
#include "ns3/csma-module.h"
#include "ns3/internet-module.h"
#include "ns3/point-to-point-module.h"
#include "ns3/applications-module.h"

using namespace ns3;

int main(int argc,char *argv[]){

CommandLine cmd;
cmd.Parse(argc,argv);
LogComponentEnable("UdpEchoClientApplication",LOG_LEVEL_INFO);
LogComponentEnable("UdpEchoServerApplication",LOG_LEVEL_INFO);
NodeContainer p2pNodes;
p2pNodes.Create(3);
NodeContainer csmaNodes;
csmaNodes.Add(p2pNodes.Get(1));
csmaNodes.Create(3);
PointToPointHelper pointToPoint1;
pointToPoint1.SetDeviceAttribute("DataRate",StringValue("5Mbps"));
pointToPoint1.SetChannelAttribute("Delay",StringValue("2ms"));
PointToPointHelper pointToPoint2;
pointToPoint2.SetDeviceAttribute("DataRate",StringValue("5Mbps"));
pointToPoint2.SetChannelAttribute("Delay",StringValue("2ms"));
NetDeviceContainer p2pDevices1;
p2pDevices1=pointToPoint1.Install(p2pNodes.Get(0),p2pNodes.Get(1));
NetDeviceContainer p2pDevices2;
p2pDevices2=pointToPoint2.Install(p2pNodes.Get(1),p2pNodes.Get(2));
CsmaHelper csma;
csma.SetChannelAttribute("DataRate",StringValue("100Mbps"));
csma.SetChannelAttribute("Delay",TimeValue(NanoSeconds(6560)));
NetDeviceContainer csmaDevices;
csmaDevices=csma.Install(csmaNodes);
InternetStackHelper stack;
stack.Install(p2pNodes.Get(0));
stack.Install(p2pNodes.Get(2));
stack.Install(csmaNodes);
Ipv4AddressHelper address1;
address1.SetBase("192.168.1.0","255.255.255.0");
Ipv4InterfaceContainer p2pInterfaces1;
p2pInterfaces1=address1.Assign(p2pDevices1);
Ipv4AddressHelper address2;
address2.SetBase("192.168.2.0","255.255.255.0");
Ipv4InterfaceContainer p2pInterfaces2;
p2pInterfaces2=address2.Assign(p2pDevices2);
Ipv4AddressHelper address;
address.SetBase("192.168.3.0","255.255.255.0");
Ipv4InterfaceContainer csmaInterfaces;
csmaInterfaces=address.Assign(csmaDevices);
UdpEchoServerHelper echoServer(9);
ApplicationContainer serverApps=echoServer.Install(csmaNodes.Get(0));
serverApps.Start(Seconds(1.0));
serverApps.Stop(Seconds(10.0));
UdpEchoClientHelper echoClient (p2pInterfaces2.GetAddress(1),9);
echoClient.SetAttribute("MaxPackets",UintegerValue(1));
echoClient.SetAttribute("Interval",TimeValue(Seconds(1.0)));
echoClient.SetAttribute("PacketSize",UintegerValue(1024));
ApplicationContainer 
clientApps=echoClient.Install(p2pNodes.Get(2));
clientApps.Start(Seconds(2.0));
clientApps.Stop(Seconds(10.0));
Ipv4GlobalRoutingHelper::PopulateRoutingTables();
Simulator::Run();
Simulator::Destroy();
return 0; 
}