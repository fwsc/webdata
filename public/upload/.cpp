#include<stdio.h>
#include<string.h>
#include<stdlib.h>
#define MEM_D_SIZE 1024*1024 //�ܴ��̿ռ�Ϊ1M
#define DISKSIZE 1024	//���̿�Ĵ�С1K
#define DISK_NUM 1024	//���̿���Ŀ1K
#define FATSIZE DISK_NUM*sizeof(struct fatitem)	//FAT���С
#define ROOT_DISK_NO FATSIZE/DISKSIZE+1	//��Ŀ¼��ʼ�̿��
#define ROOT_DISK_SIZE sizeof(struct direct)	//��Ŀ¼��С
#define DIR_MAXSIZE 1024	//·����󳤶�Ϊ1KB
#define MSD 5	//�����Ŀ¼��5
#define MOFN 5	//����ļ����Ϊ5
#define MAX_WRITE 1024*128	//���д�����ֳ���128KB
struct fatitem /* size 8*/
{
int item; /*����ļ���һ�����̵�ָ��*/
char em_disk; /*���̿��Ƿ���б�־λ 0 ����*/
};
struct direct
{
/*-----�ļ����ƿ���Ϣ-----*/
struct FCB
{
char name[9]; /*�ļ�/Ŀ¼�� 8λ*/
char property; /*���� 1λĿ¼ 0λ��ͨ�ļ�*/
int size; /*�ļ�/Ŀ¼�ֽ������̿���)*/
int firstdisk; /*�ļ�/Ŀ¼ ��ʼ�̿��*/
int next; /*��Ŀ¼��ʼ�̿��*/
int sign; /*1�Ǹ�Ŀ¼ 0���Ǹ�Ŀ¼*/
}directitem[MSD+2];
};
struct opentable
{
struct openttableitem
{
char name[9]; /*�ļ���*/
int firstdisk; /*��ʼ�̿��*/
int size; /*�ļ��Ĵ�С*/
}openitem[MOFN];
int cur_size; /*��ǰ���ļ�����Ŀ*/
};
struct fatitem *fat; /*FAT��*/
struct direct *root; /*��Ŀ¼*/
struct direct *cur_dir; /*��ǰĿ¼*/
struct opentable u_opentable; /*�ļ��򿪱�*/
int fd=-1; /*�ļ��򿪱�����*/
char *bufferdir; /*��¼��ǰ·��������*/
char *fdisk; /*���������ʼ��ַ*/
void initfile();
void format();
void enter();
void halt();
int create(char *name);
int open(char *name);
int close(char *name);
int write(int fd,char *buf,int len);
int read(int fd,char *buf);
int del(char *name);
int mkdir(char *name);
int rmdir(char *name);
void dir();
int cd(char *name);
void print();
void show();
void initfile()
{
fdisk = (char *)malloc(MEM_D_SIZE*sizeof(char)); /*���� 1M�ռ�*/
format();
}
void format()
{
int i;
FILE *fp;
fat = (struct fatitem *)(fdisk+DISKSIZE); /*����FAT���ַ�����������ƫ�� 1k)*/
/*-----��ʼ��FAT��------------*/
fat[0].item=-1; /*������*/
fat[0].em_disk='1';
for(i=1;i<ROOT_DISK_NO-1;i++) /*��� FAT��Ĵ��̿��*/
{
fat[i].item=i+1;
fat[i].em_disk='1';
}
fat[ROOT_DISK_NO].item=-1; /*��Ÿ�Ŀ¼�Ĵ��̿��*/
fat[ROOT_DISK_NO].em_disk='1';
for(i=ROOT_DISK_NO+1;i<DISK_NUM;i++)
{
fat[i].item = -1;
fat[i].em_disk = '0';
}
/*-----------------------------------------------*/
root = (struct direct *)(fdisk+DISKSIZE+FATSIZE); /*��Ŀ¼�ĵ�ַ*/
/*��ʼ��Ŀ¼*/
/*---------ָ��ǰĿ¼��Ŀ¼��---------*/
root->directitem[0].sign = 1;
root->directitem[0].firstdisk = ROOT_DISK_NO;
strcpy(root->directitem[0].name,".");
root->directitem[0].next = root->directitem[0].firstdisk;
root->directitem[0].property = '1';
root->directitem[0].size = ROOT_DISK_SIZE;
/*-------ָ����һ��Ŀ¼��Ŀ¼��---------*/
root->directitem[1].sign = 1;
root->directitem[1].firstdisk = ROOT_DISK_NO;
strcpy(root->directitem[1].name,"..");
root->directitem[1].next = root->directitem[0].firstdisk;
root->directitem[1].property = '1';
root->directitem[1].size = ROOT_DISK_SIZE;
if((fp = fopen("disk.dat","wb"))==NULL)
{
printf("Error:\n Cannot open file \n");
return;
}
for(i=2;i<MSD+2;i++) /*-��Ŀ¼��ʼ��Ϊ��-*/
{
root->directitem[i].sign = 0;
root->directitem[i].firstdisk = -1;
strcpy(root->directitem[i].name,"");
root->directitem[i].next = -1;
root->directitem[i].property = '0';
root->directitem[i].size = 0;
}
if((fp = fopen("disk.dat","wb"))==NULL)
{
printf("Error:\n Cannot open file \n");
return;
}
if(fwrite(fdisk,MEM_D_SIZE,1,fp)!=1) /*��������̿ռ䱣�浽�����ļ���*/
{
printf("Error:\n File write error! \n");
}
fclose(fp);
}
void enter()
{
FILE *fp;
int i;
fdisk = (char *)malloc(MEM_D_SIZE*sizeof(char)); /*���� 1M�ռ�*/
if((fp=fopen("disk.dat","rb"))==NULL)
{
printf("Error:\nCannot open file\n");
return;
}
if(!fread(fdisk,MEM_D_SIZE,1,fp)) /*�Ѵ����ļ�disk.dat ����������̿ռ�(�ڴ�)*/
{
printf("Error:\nCannot read file\n");
exit(0);
}
fat = (struct fatitem *)(fdisk+DISKSIZE); /*�ҵ�FAT���ַ*/
root = (struct direct *)(fdisk+DISKSIZE+FATSIZE);/*�ҵ���Ŀ¼��ַ*/
fclose(fp);
/*--------------��ʼ���û��򿪱�------------------*/
for(i=0;i<MOFN;i++)
{
strcpy(u_opentable.openitem[i].name,"");
u_opentable.openitem[i].firstdisk = -1;
u_opentable.openitem[i].size = 0;
}
u_opentable.cur_size = 0;
cur_dir = root; /*��ǰĿ¼Ϊ��Ŀ¼*/
bufferdir = (char *)malloc(DIR_MAXSIZE*sizeof(char));
strcpy(bufferdir,"Root:");
}
void halt()
{
FILE *fp;
int i;
if((fp=fopen("disk.dat","wb"))==NULL)
{
printf("Error:\nCannot open file\n");
return;
}
if(!fwrite(fdisk,MEM_D_SIZE,1,fp)) /*��������̿ռ�(�ڴ�)���ݶ�������ļ�disk.dat */
{
printf("Error:\nFile write error!\n");
}
fclose(fp);
free(fdisk);
free(bufferdir);
return;
}
int create(char *name)
{
int i,j;
if(strlen(name)>8) /*�ļ������� 8λ*/
return(-1);
for(j=2;j<MSD+2;j++) /*��鴴���ļ��Ƿ����Ѵ��ڵ��ļ�����*/
{
if(!strcmp(cur_dir->directitem[j].name,name))
break;
}
if(j<MSD+2) /*�ļ��Ѿ�����*/
return(-4);
for(i=2;i<MSD+2;i++) /*�ҵ���һ��������Ŀ¼*/
{
if(cur_dir->directitem[i].firstdisk==-1)
break;
}
if(i>=MSD+2) /*�޿�Ŀ¼��*/
return(-2);
if(u_opentable.cur_size>=MOFN) /*���ļ�̫��*/
return(-3);
for(j=ROOT_DISK_NO+1;j<DISK_NUM;j++) /*�ҵ������̿� j ���˳�*/
{
if(fat[j].em_disk=='0')
break;
}
if(j>=DISK_NUM)
return(-5);
fat[j].em_disk = '1'; /*�����п���Ϊ�Ѿ�����*/
/*-----------��дĿ¼��-----------------*/
strcpy(cur_dir->directitem[i].name,name);
cur_dir->directitem[i].firstdisk = j;
cur_dir->directitem[i].size = 0;
cur_dir->directitem[i].next = j;
cur_dir->directitem[i].property = '0';
/*---------------------------------*/
fd = open(name);
return 0;
}
int open(char *name)
{
int i, j;
for(i=2;i<MSD+2;i++) /*�ļ��Ƿ����*/
{
if(!strcmp(cur_dir->directitem[i].name,name))
break;
}
if(i>=MSD+2)
return(-1);
/*--------���ļ�����Ŀ¼-----------------------*/
if(cur_dir->directitem[i].property=='1')
return(-4);
/*--------�ļ��Ƿ��-----------------------*/
for(j=0;j<MOFN;j++)
{
if(!strcmp(u_opentable.openitem[j].name,name))
break;
}
if(j<MOFN) /*�ļ��Ѿ���*/
return(-2);
if(u_opentable.cur_size>=MOFN) /*�ļ���̫��*/
return(-3);
/*--------����һ�������û��򿪱���-----------------------*/
for(j=0;j<MOFN;j++)
{
if(u_opentable.openitem[j].firstdisk==-1)
break;
}
/*--------------��д����������Ϣ------------------------*/
u_opentable.openitem[j].firstdisk = cur_dir->directitem[i].firstdisk;
strcpy(u_opentable.openitem[j].name,name);
u_opentable.openitem[j].size = cur_dir->directitem[i].size;
u_opentable.cur_size++;
/*----------�����û��򿪱��������--------------------------*/
return(j);
}
int close(char *name)
{
int i;
for(i=0;i<MOFN;i++)
{
if(!strcmp(u_opentable.openitem[i].name,name))
break;
}
if(i>=MOFN)
return(-1);
/*-----------��ո��ļ����û��򿪱��������---------------------*/
strcpy(u_opentable.openitem[i].name,"");
u_opentable.openitem[i].firstdisk = -1;
u_opentable.openitem[i].size = 0;
u_opentable.cur_size--;
return 0;
}
int write(int fd, char *buf, int len)
{
char *first;
int item, i, j, k;
int ilen1, ilen2, modlen, temp;
/*----------�� $ �ַ���Ϊ�ո� # �ַ���Ϊ���з�-----------------------*/
char Space = 32;
char Endter= '\n';
for(i=0;i<len;i++)
{
if(buf[i] == '$')
buf[i] = Space;
else if(buf[i] == '#')
buf[i] = Endter;
}
/*----------��ȡ�û��򿪱��Ӧ�����һ���̿��-----------------------*/
item = u_opentable.openitem[fd].firstdisk;
/*-------------�ҵ���ǰĿ¼����Ӧ��������-------------------------*/
for(i=2;i<MSD+2;i++)
{
if(cur_dir->directitem[i].firstdisk==item)
break;
}
temp = i; /*-��ŵ�ǰĿ¼����±�-*/
/*------�ҵ���item �Ǹ��ļ������һ����̿�-------------------*/
while(fat[item].item!=-1)
{
item =fat[item].item; /*-���Ҹ��ļ�����һ�̿�--*/
}
/*-----��������ļ�����ĩ��ַ-------*/
first = fdisk+item*DISKSIZE+u_opentable.openitem[fd].size%DISKSIZE;
/*-----��������̿�ʣ��Ĵ�С����Ҫд����ļ��Ĵ�С-------*/
if(DISKSIZE-u_opentable.openitem[fd].size%DISKSIZE>len)
{
strcpy(first,buf);
u_opentable.openitem[fd].size = u_opentable.openitem[fd].size+len;
cur_dir->directitem[temp].size = cur_dir->directitem[temp].size+len;
}
else
{
for(i=0;i<(DISKSIZE-u_opentable.openitem[fd].size%DISKSIZE);i++)
{/*дһ�������ݵ����һ����̿��ʣ��ռ�(�ֽ�)*/
first[i] = buf [i];
}
/*-----������������һ����̵�ʣ��ռ�(�ֽ�) ��ʣ�¶����ֽ�δ�洢-------*/
ilen1 = len-(DISKSIZE-u_opentable.openitem[fd].size%DISKSIZE);
ilen2 = ilen1/DISKSIZE;
modlen = ilen1%DISKSIZE;
if(modlen>0)
ilen2 = ilen2+1; /*--����Ҫ���ٿ���̿�-*/
for(j=0;j<ilen2;j++)
{
for(i=ROOT_DISK_NO+1;i<DISK_NUM;i++)/*Ѱ�ҿ��д��̿�*/
{
if(fat[i].em_disk=='0')
break;
}
if(i>=DISK_NUM) /*--������̿��Ѿ���������-*/
return(-1);
first = fdisk+i*DISKSIZE; /*--�ҵ����ǿ���д��̿����ʼ��ַ-*/
if(j==ilen2-1) /*--��������Ҫ�����һ��-*/
{
for(k=0;k<len-(DISKSIZE-u_opentable.openitem[fd].size%DISKSIZE)-j*DISKSIZE;k++)
first[k] = buf[k];
}
else/*-�������Ҫ�������һ��--*/
{
for(k=0;k<DISKSIZE;k++)
first[k] =buf[k];
}
fat[item].item = i; /*--�ҵ�һ���������Ŵ������һ���ָ����-*/
fat[i].em_disk = '1'; /*--���ҵ��Ĵ��̿�Ŀ��б�־λΪ�ѷ���-*/
fat[i].item = -1; /*--����ָ��Ϊ -1 (��û����һ��)-*/
}
/*--�޸ĳ���-*/
u_opentable.openitem[fd].size = u_opentable.openitem[fd].size+len;
cur_dir->directitem[temp].size = cur_dir->directitem[temp].size+len;
}
return 0;
}
int read(int fd, char *buf)
{
int len = u_opentable.openitem[fd].size;
char *first;
int i, j, item;
int ilen1, modlen;
item = u_opentable.openitem[fd].firstdisk;
ilen1 = len/DISKSIZE;
modlen = len%DISKSIZE;
if(modlen!=0)
ilen1 = ilen1+1; /*--�����ļ���ռ���̵Ŀ���-*/
first = fdisk+item*DISKSIZE; /*--�����ļ�����ʼλ��-*/
for(i=0;i<ilen1;i++)
{
if(i==ilen1-1) /*--��������һ�����̿�-*/
{
for(j=0;j<len-i*DISKSIZE;j++)
buf[i*DISKSIZE+j] = first[j];
}
else /*--�������һ����̿�-*/
{
for(j=0;j<len-i*DISKSIZE;j++)
buf[i*DISKSIZE+j] = first[j];
item = fat[item].item; /*-������һ�̿�-*/
first = fdisk+item*DISKSIZE;
}
}
return 0;
}
int del(char *name)
{
int i,cur_item,item,temp;
for(i=2;i<MSD+2;i++) /*--����Ҫɾ���ļ��Ƿ��ڵ�ǰĿ¼��-*/
{
if(!strcmp(cur_dir->directitem[i].name,name))
break;
}
}