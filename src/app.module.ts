import { Module } from '@nestjs/common';
import { AppController } from './app.controller';
import { AppService } from './app.service';
import { MongooseModule } from '@nestjs/mongoose';
import { ConfigModule } from '@nestjs/config';
import { CategorieModule } from './categorie/categorie.module';
import { ProduitModule } from './produit/produit.module';

@Module({
  imports: [
          ConfigModule.forRoot({ isGlobal: true }),
          MongooseModule.forRoot(process.env.MONGODB_URL),
          CategorieModule,
          ProduitModule,],
  controllers: [AppController],
  providers: [AppService],
})
export class AppModule {}
